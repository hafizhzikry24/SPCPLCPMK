<?php

namespace App\Http\Controllers;

use App\Charts\ChartExcelSDL;
use App\Charts\PieChartPTSK6506;
use App\Imports\ExcelSDLimport;
use App\Models\excelsdl;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mata_kuliah;

class ExcelsdlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChartExcelSDL $chart, PieChartPTSK6506 $PieChart,  Request $request)
    {
        $selectedCpmk = $request->input('selectedCpmk', 1);

        $idToMatch = 'PTSK6506';
        $mataKuliahInfo = Mata_kuliah::where('kode_MK', $idToMatch)->get();

        $nilai = excelsdl::all();

        $PieChart = new PieChartPTSK6506(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedCpmk);

        if(request()->ajax()) {
            return datatables()->of(excelsdl::select('*'))
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.excel.excel', [
            'PieChart' => $PieChart->build($selectedCpmk),
            'chart' => $chart->build(),
            'mataKuliahInfo' => $mataKuliahInfo,
            'nilai' => $nilai,
            'selectedCpmk' => $selectedCpmk,
        ]);
    }

    public function excelsdlimport(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMatkul', $namaFile);

        Excel::import(new ExcelSDLimport, public_path('/DataMatkul/'.$namaFile));
        return redirect('/matakuliah/PTSK6506');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\excelsdl  $excelsdl
     * @return \Illuminate\Http\Response
     */
    public function show(excelsdl $excelsdl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\excelsdl  $excelsdl
     * @return \Illuminate\Http\Response
     */
    public function edit(excelsdl $excelsdl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\excelsdl  $excelsdl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, excelsdl $excelsdl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\excelsdl  $excelsdl
     * @return \Illuminate\Http\Response
     */
    public function destroy(excelsdl $excelsdl)
    {
        //
    }
}
