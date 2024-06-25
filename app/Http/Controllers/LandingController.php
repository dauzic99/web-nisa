<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Period;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\Response;
use App\Models\Service;
use App\Services\AntaresService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class LandingController extends Controller
{

    public function index(AntaresService $antares)
    {
        $faculties = Faculty::all();
        $data = $antares->fetchLatestData();
        $ozoneISPU = $this->calculateISPU('O3', $data['data']['Ozon']);
        $pm10ISPU = $this->calculateISPU('PM10', $data['data']['PM10']);
        $no2ISPU = $this->calculateISPU('NO2', $data['data']['NO2']);
        $coISPU = $this->calculateISPU('CO', $data['data']['CO']);
        $maxISPU = max($ozoneISPU, $pm10ISPU, $no2ISPU, $coISPU);

        $datas = $antares->fetchData();
        $minOzon = PHP_FLOAT_MAX;
        $maxOzon = PHP_FLOAT_MIN;
        $minPM10 = PHP_FLOAT_MAX;
        $maxPM10 = PHP_FLOAT_MIN;
        $minNO2 = PHP_FLOAT_MAX;
        $maxNO2 = PHP_FLOAT_MIN;
        $minCO = PHP_FLOAT_MAX;
        $maxCO = PHP_FLOAT_MIN;

        // Iterate over each data entry in the array
        foreach ($datas as $entry) {
            $entryd = $entry['data'];

            // Update min and max values for Ozon
            $minOzon = min($minOzon, $entryd['Ozon']);
            $maxOzon = max($maxOzon, $entryd['Ozon']);

            // Update min and max values for PM10
            $minPM10 = min($minPM10, $entryd['PM10']);
            $maxPM10 = max($maxPM10, $entryd['PM10']);

            // Update min and max values for NO2
            $minNO2 = min($minNO2, $entryd['NO2']);
            $maxNO2 = max($maxNO2, $entryd['NO2']);

            // Update min and max values for CO
            $minCO = min($minCO, $entryd['CO']);
            $maxCO = max($maxCO, $entryd['CO']);
        }
        return view('landing.pages.index', [
            'faculties' => $faculties,
            'data' => $data,
            'maxISPU' => $maxISPU,
            'minOzon' => $minOzon,
            'maxOzon' => $maxOzon,
            'minPM10' => $minPM10,
            'maxPM10' => $maxPM10,
            'minNO2' => $minNO2,
            'maxNO2' => $maxNO2,
            'minCO' => $minCO,
            'maxCO' => $maxCO,
        ]);
    }

    public function showDetail(Request $request, AntaresService $antares)
    {
        $faculty = Faculty::findOrFail($request->id);
        $data = $antares->fetchLatestData();
        $datas = $antares->fetchData();
        // Initialize arrays to store daily data for each parameter
        // Initialize arrays to store sums and counts for calculating averages
        $pm10Sums = $coSums = $no2Sums = $OzonSums = [];
        $pm10Counts = $coCounts = $no2Counts = $OzonCounts = [];

        // Determine the latest date from the dataset
        $latestDate = Carbon::createFromFormat('d-m-Y H:i:s', collect($datas)->max('timestamp'))->format('Y-m-d');

        foreach ($datas as $d) {
            $dateTime = Carbon::createFromFormat('d-m-Y H:i:s', $d['timestamp']);
            $dateKey = $dateTime->format('Y-m-d');

            // Filter out only the data for the latest date
            if ($dateKey === $latestDate) {
                // Get the hour to use as the key
                $hourKey = $dateTime->format('H');

                // Sum the data for this hour
                $pm10Sums[$hourKey] = ($pm10Sums[$hourKey] ?? 0) + ($d['data']['PM10'] ?? 0);
                $coSums[$hourKey] = ($coSums[$hourKey] ?? 0) + ($d['data']['CO'] ?? 0);
                $no2Sums[$hourKey] = ($no2Sums[$hourKey] ?? 0) + ($d['data']['NO2'] ?? 0);
                $OzonSums[$hourKey] = ($OzonSums[$hourKey] ?? 0) + ($d['data']['Ozon'] ?? 0);

                // Count the data points for this hour
                $pm10Counts[$hourKey] = ($pm10Counts[$hourKey] ?? 0) + 1;
                $coCounts[$hourKey] = ($coCounts[$hourKey] ?? 0) + 1;
                $no2Counts[$hourKey] = ($no2Counts[$hourKey] ?? 0) + 1;
                $OzonCounts[$hourKey] = ($OzonCounts[$hourKey] ?? 0) + 1;
            }
        }

        ksort($pm10Sums);
        ksort($coSums);
        ksort($no2Sums);
        ksort($OzonSums);

        // Calculate averages
        $pm10Averages = [];
        $coAverages = [];
        $no2Averages = [];
        $OzonAverages = [];
        $labels = [];

        foreach ($pm10Sums as $hour => $sum) {
            $labels[] = $hour . ':00'; // Format for hour label
            $pm10Averages[] = $sum / $pm10Counts[$hour];
            $coAverages[] = $coSums[$hour] / $coCounts[$hour];
            $no2Averages[] = $no2Sums[$hour] / $no2Counts[$hour];
            $OzonAverages[] = $OzonSums[$hour] / $OzonCounts[$hour];
        }


        // Prepare input data for KNN classification
        $knnInputData = [
            $data['data']['PM10'], // Using AQI for classification
            $data['data']['CO'],
            $data['data']['NO2'],
            $data['data']['Ozon']
        ];

        // Define the training dataset
        $trainingDataset = [
            [25, 0, 0, 0.005],   // Example within range 1-50
            [75, 5, 2, 0.02],    // Example within range 51-100
            [150, 10, 5, 0.1],   // Example within range 101-200
            [250, 20, 10, 0.15], // Example within range 201-300
            [350, 30, 15, 0.2],  // Example within range 301+
        ];

        // Define the corresponding labels for each training data point
        $labels = [
            'Baik',                // Label for example within range 1-50
            'Sedang',              // Label for example within range 51-100
            'Tidak Sehat',         // Label for example within range 101-200
            'Sangat Tidak Sehat',  // Label for example within range 201-300
            'Berbahaya',           // Label for example within range 301+
        ];


        $classificationResult = $this->knnClassify($knnInputData, $trainingDataset, $labels);

        return View::make("landing.modals.detail")
            ->with("faculty", $faculty)
            ->with("data", $data)
            ->with("datas", $datas)
            ->with("pm10Data", $pm10Averages)
            ->with("coData", $coAverages)
            ->with("no2Data", $no2Averages)
            ->with("OzonData", $OzonAverages)
            ->with("labels", $labels)
            ->with("classificationResult", $classificationResult)
            ->with("latestDate", Carbon::parse($latestDate)->format('d-m-Y')) // Pass the latest date to the view
            ->render();
    }

    function knnClassify($data, $dataset, $labels, $k = 3)
    {
        $distances = [];
        $iterations = 0;

        // Calculate the Euclidean distance between the input data and all data points in the dataset
        foreach ($dataset as $index => $point) {
            $distance = 0;
            foreach ($point as $i => $value) {
                $distance += pow($data[$i] - $value, 2);
                $iterations++;
            }
            $distances[] = sqrt($distance);
        }

        // Sort distances and get the indices of the k nearest neighbors
        asort($distances);
        $nearestNeighbors = array_slice(array_keys($distances), 0, $k, true);

        // Count the frequency of each label in the nearest neighbors
        $frequency = [];
        foreach ($nearestNeighbors as $index) {
            $label = $labels[$index];
            if (isset($frequency[$label])) {
                $frequency[$label]++;
            } else {
                $frequency[$label] = 1;
            }
        }

        // Determine the most frequent label (mode) among the nearest neighbors
        arsort($frequency);
        $mostFrequentLabel = array_key_first($frequency);
        $mostFrequentCount = $frequency[$mostFrequentLabel];

        // Gather the distances of the nearest neighbors
        $nearestDistances = array_intersect_key($distances, array_flip($nearestNeighbors));

        return [
            'label' => $mostFrequentLabel,
            'frequency' => $mostFrequentCount,
            'iterations' => $iterations,
            'nearest_distances' => $nearestDistances
        ];
    }

    public function calculateISPU($pollutant, $concentration)
    {
        $ispuTable = [
            'O3' => [
                [0, 0.164, 0, 100],
                [0.165, 0.204, 101, 199],
                [0.205, 0.404, 200, 299],
                [0.405, 0.504, 300, 399],
                [0.505, 0.604, 400, 499],
            ],
            'PM10' => [
                [0, 50, 0, 50],
                [51, 150, 51, 100],
                [151, 350, 101, 199],
                [351, 420, 200, 299],
                [421, 500, 300, 399],
            ],
            'NO2' => [
                [0, 0.53, 0, 100],
                [0.54, 0.649, 101, 199],
                [0.65, 1.249, 200, 299],
                [1.25, 1.649, 300, 399],
                [1.65, 2.049, 400, 499],
            ],
            'CO' => [
                [0, 4.4, 0, 50],
                [4.5, 9.4, 51, 100],
                [9.5, 12.4, 101, 199],
                [12.5, 15.4, 200, 299],
                [15.5, 30.4, 300, 399],
            ],
        ];

        $table = $ispuTable[$pollutant];

        foreach ($table as $range) {
            [$C_low, $C_high, $I_low, $I_high] = $range;

            if ($concentration >= $C_low && $concentration <= $C_high) {
                return ($concentration - $C_low) / ($C_high - $C_low) * ($I_high - $I_low) + $I_low;
            }
        }

        return null;
    }
}
