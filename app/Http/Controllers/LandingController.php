<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Question;
use App\Models\Respondent;
use App\Models\Response;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class LandingController extends Controller
{

    public function index()
    {

        return view('landing.pages.index', []);
    }
    public function kuesioner()
    {
        $services = Service::with('questions')->get();
        // dd($question);
        return view('landing.pages.questionaire', [
            'services' => $services,
        ]);
    }

    public function kuesioner_download()
    {
        $file = public_path() . "/files/panduan.pdf";

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, 'Panduan Pengisian Kuesioner IKM DPRD.pdf', $headers);
    }

    public function ikm_index()
    {
        $periods = Period::latest()->get();
        return view('landing.pages.ikm.index', [
            'periods' => $periods,
        ]);
    }

    public function ikm_response(Request $request)
    {
        if ($request->ajax()) {
            $questions = Question::all();
            $endDate = Carbon::createFromDate($request->year, $request->endmonth, 1);
            $from = date($request->year . '-' . $request->startmonth . '-01');
            $to = $endDate->endOfMonth()->toDateString();
            $datas = Respondent::whereBetween('created_at', [$from, $to])->get();
            $ids = Respondent::whereBetween('created_at', [$from, $to])->pluck('id')->toArray();
            if ($datas->count() == 0) {
                return response('Data Pada Periode Ini Belum Ada', 404);
            }
            if ($request->startmonth == 01) {
                $semester = 1;
                $to = $endDate->endOfMonth()->toDateString();
                $toDate = $endDate->endOfMonth()->format('d-m-Y');
                $period = '01-01-' . $request->year . ' s/d ' . $toDate;
            } else {
                $semester = 2;
                $to = $endDate->endOfMonth()->toDateString();
                $toDate = $endDate->endOfMonth()->format('d-m-Y');
                $period = '01-07-' . $request->year . ' s/d ' . $toDate;
            }
            //per unsur
            $services = Service::all();
            $avg_service = $this->getAvgService($services, $datas, $ids);

            //per unsur dan fraction
            $fractions = DB::table('respondents')
                ->select('fraction', DB::raw('count(*) as total'))
                ->whereBetween('created_at', [$from, $to])
                ->groupBy('fraction')
                ->get();

            $fraction_data = array();
            foreach ($fractions as $fraction) {
                $fraction_ids = Respondent::whereBetween('created_at', [$from, $to])
                    ->where('fraction', $fraction->fraction)
                    ->pluck('id')
                    ->toArray();
                $avg_fraction = $this->getAvgService($services, $datas, $fraction_ids, $fractions->count());
                array_push($fraction_data, [
                    'label' => $fraction->fraction,
                    'avg' => $avg_fraction
                ]);
            }

            //per unsur dan gender
            $genders = DB::table('respondents')
                ->select('gender', DB::raw('count(*) as total'))
                ->whereBetween('created_at', [$from, $to])
                ->groupBy('gender')
                ->get();

            $gender_data = array();
            foreach ($genders as $gender) {
                $gender_ids = Respondent::whereBetween('created_at', [$from, $to])
                    ->where('gender', $gender->gender)
                    ->pluck('id')
                    ->toArray();
                $avg_gender = $this->getAvgService($services, $datas, $gender_ids, $genders->count());
                array_push($gender_data, [
                    'label' => $gender->gender,
                    'avg' => $avg_gender
                ]);
            }

            $indeks = number_format(array_sum($avg_service) / count($avg_service), 2);


            $array_gender = DB::table('respondents')
                ->select('gender', DB::raw('count(*) as total'))
                ->whereBetween('created_at', [$from, $to])
                ->groupBy('gender')
                ->get()
                ->toArray();
            $array_fraction = DB::table('respondents')
                ->select('fraction', DB::raw('count(*) as total'))
                ->whereBetween('created_at', [$from, $to])
                ->groupBy('fraction')
                ->get()
                ->toArray();
            // dd($gender);
            return View::make("landing.pages.ikm.response")
                ->with("datas", $datas)
                ->with("questions", $questions)
                ->with("avg_service", json_encode($avg_service))
                ->with("services", json_encode($services))
                ->with("count_service", $services->count())
                // ->with("count_job", $jobs->count())
                // ->with("data_job", json_encode($job_data))
                ->with("count_gender", $genders->count())
                ->with("data_gender", json_encode($gender_data))
                ->with("count_fraction", $fractions->count())
                ->with("data_fraction", json_encode($fraction_data))
                // ->with("count_education", $educations->count())
                // ->with("data_education", json_encode($education_data))
                // ->with("count_age", $ages->count())
                // ->with("data_age", json_encode($age_data))
                // ->with("gender", json_encode($gender))
                // ->with("age", json_encode($age))
                // ->with("education", json_encode($education))
                ->with("indeks", $indeks)
                ->with("semester", $semester)
                ->with("array_gender", $array_gender)
                ->with("array_fraction", $array_fraction)
                ->with("period", $period)
                ->render();
        }
    }

    public function getAvgService($services, $datas, $ids, $count = 1)
    {
        $sum_service = array();
        $avg_service = array();
        foreach ($services as $service) {
            $avg_question = array();
            foreach ($service->questions as $serQ) {
                $res_ser = Response::whereIn('responses.respondent_id', $ids)
                    ->where('responses.question_id', $serQ->id)
                    ->join('answers', 'answers.id', '=', 'responses.answer_id')
                    ->sum('answers.point');
                array_push($sum_service, $res_ser);
                $average_ser = number_format($res_ser / $datas->count(), 2);
                array_push($avg_question, $average_ser * $count);
            }
            array_push($avg_service, (array_sum($avg_question) / count($avg_question)) * (100 / 4));
        }
        return $avg_service;
    }
}
