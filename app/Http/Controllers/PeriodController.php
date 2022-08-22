<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $title = "Period";
    public function index()
    {
        $periods = Period::all();
        return view('admin.period.index',[
            'periods'=>$periods,
            'title' => $this->title,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.period.create',
        ['title' => $this->title],);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodRequest $request)
    {
        $checkPeriod = Period::where([
            ['period',  $request->period],
            ['year', $request->year],
        ])->first();
        if (isset($checkPeriod)) {
            return  redirect()->back()->withInput()->withErrors(['message' => 'Data periode telah ada pastikan menambahkan hanya periode yang belum ada']);
        }
        $period = Period::insert($request->except(['_token']));
        return redirect()->route('period.index')->with('status','Data periode berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        return view('admin.period.detail',['period'=>$period]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('admin.period.edit',['period'=>$period,'title' => $this->title,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodRequest  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        $checkPeriod = Period::where([
            ['period',  $request->period],
            ['year', $request->year],
        ])->first();
        if (isset($checkPeriod)) {
            if ($checkPeriod->period == $period->period && $checkPeriod->year == $period->year) {
                return  redirect()->back()->withInput()->with('status','Tidak ada perubahan');
            }else{
                return  redirect()->back()->withInput()->withErrors(['message' => 'Data periode telah ada, pastikan menambahkan hanya periode yang belum ada']);
            }
        }
        $period->update($request->except(['_token']));
        return redirect()->route('period.index',)->with('status','Data periode berhasil diubah');
    }

    public function activate(Period $period)
    {
        $periods = Period::query()->update(['is_active'=>false]);
        $period->update([
            'is_active'=>true
        ]);
        return redirect()->route('period.index',)->with('status','Data periode berhasil diubah');
    }
    public function deactivate(Period $period)
    {

        $period->update([
            'is_active'=>false
        ]);
        return redirect()->route('period.index',)->with('status','Data periode berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        $period->delete();
        return redirect()->route('period.index',)->with('status','Data periode berhasil dihapus');
    }
}
