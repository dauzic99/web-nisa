<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRespondentRequest;
use App\Http\Requests\UpdateRespondentRequest;
use App\Models\Period;
use App\Models\Respondent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class RespondentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::latest()->get();
        return view('admin.report.respondent', [
            'periods' => $periods,
            'title' => 'Responden'
        ]);
    }

    public function showResponse(Respondent $respondent)
    {
        return view('admin.report.response', [
            'respondent' => $respondent,
            'title' => 'Responden'
        ]);
    }

    public function printResponse(Respondent $respondent)
    {
        return view('admin.report.print-response', [
            'respondent' => $respondent,
        ]);
    }

    public function printAllResponse(Request $request)
    {
        $endDate = Carbon::createFromDate($request->year, $request->endmonth, 1);
        $from = date($request->year . '-' . $request->startmonth . '-01');
        $to = $endDate->endOfMonth()->toDateString();
        $datas = Respondent::whereBetween('created_at', [$from, $to])->get();

        if ($datas->count() == 0) {
            return redirect()->back()->withErrors(['message'=>'Data Pada Periode Ini Belum Ada']);
        }
        return view('admin.report.print-all-response', [
            'respondents' => $datas,
        ]);
    }



    public function loaddatas(Request $request)
    {
        if ($request->ajax()) {
            $endDate = Carbon::createFromDate($request->year, $request->endmonth, 1);
            $from = date($request->year . '-' . $request->startmonth . '-01');
            $to = $endDate->endOfMonth()->toDateString();
            $datas = Respondent::whereBetween('created_at', [$from, $to])->get();

            if ($datas->count() == 0) {
                return response('Data Pada Periode Ini Belum Ada', 404);
            }

            return View::make("admin.report.respondent-loaddatas", [
                'respondents' => $datas,
                'reqYear'=>$request->year,
                'reqStartMonth'=>$request->startmonth,
                'reqEndMonth'=>$request->endmonth,])
                ->render();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRespondentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRespondentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function show(Respondent $respondent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function edit(Respondent $respondent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRespondentRequest  $request
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRespondentRequest $request, Respondent $respondent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Respondent  $respondent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respondent $respondent)
    {
        $respondent->delete();
        return redirect()->route('report.respondent',)->with('status', 'Data responden berhasil dihapus');
    }
}
