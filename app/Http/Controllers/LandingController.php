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
        $datas = $antares->fetchLatestData();
        return view('landing.pages.index', [
            'faculties' => $faculties
        ]);
    }

    public function showDetail(Request $request, AntaresService $antares)
    {
        $faculty = Faculty::findOrFail($request->id);
        $data = $antares->fetchLatestData();
        $datas = $antares->fetchData();
        // Initialize arrays to store daily data for each parameter
        // Initialize arrays to store sums and counts for calculating averages
        $pm10Sums = $coSums = $no2Sums = $o3Sums = [];
        $pm10Counts = $coCounts = $no2Counts = $o3Counts = [];

        $today = Carbon::today()->format('Y-m-d');

        foreach ($datas as $d) {
            $dateTime = Carbon::createFromFormat('d-m-Y H:i:s', $d['timestamp']);
            $dateKey = $dateTime->format('Y-m-d');

            // Filter out only today's data
            if ($dateKey === $today) {
                // Get the hour to use as the key
                $hourKey = $dateTime->format('H');

                // Sum the data for this hour
                $pm10Sums[$hourKey] = ($pm10Sums[$hourKey] ?? 0) + ($d['data']['PM 10'] ?? 0);
                $coSums[$hourKey] = ($coSums[$hourKey] ?? 0) + ($d['data']['CO'] ?? 0);
                $no2Sums[$hourKey] = ($no2Sums[$hourKey] ?? 0) + ($d['data']['NO2'] ?? 0);
                $o3Sums[$hourKey] = ($o3Sums[$hourKey] ?? 0) + ($d['data']['O3'] ?? 0);

                // Count the data points for this hour
                $pm10Counts[$hourKey] = ($pm10Counts[$hourKey] ?? 0) + 1;
                $coCounts[$hourKey] = ($coCounts[$hourKey] ?? 0) + 1;
                $no2Counts[$hourKey] = ($no2Counts[$hourKey] ?? 0) + 1;
                $o3Counts[$hourKey] = ($o3Counts[$hourKey] ?? 0) + 1;
            }
        }

        ksort($pm10Sums);
        ksort($coSums);
        ksort($no2Sums);
        ksort($o3Sums);

        // Calculate averages
        $pm10Averages = [];
        $coAverages = [];
        $no2Averages = [];
        $o3Averages = [];
        $labels = [];

        foreach ($pm10Sums as $hour => $sum) {
            $labels[] = $hour . ':00'; // Format for hour label
            $pm10Averages[] = $sum / $pm10Counts[$hour];
            $coAverages[] = $coSums[$hour] / $coCounts[$hour];
            $no2Averages[] = $no2Sums[$hour] / $no2Counts[$hour];
            $o3Averages[] = $o3Sums[$hour] / $o3Counts[$hour];
        }
        // dd($pm10Data);
        return View::make("landing.modals.detail")
            ->with("faculty", $faculty)
            ->with("data", $data)
            ->with("datas", $datas)
            ->with("pm10Data", $pm10Averages)
            ->with("coData", $coAverages)
            ->with("no2Data", $no2Averages)
            ->with("o3Data", $o3Averages)
            ->with("labels", $labels)
            ->render();
    }
}
