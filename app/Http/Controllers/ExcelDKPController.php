<?php

namespace App\Http\Controllers;

use App\Charts\ChartExcelDKP;
use App\Imports\ExcelDKPimport;
use App\Models\ExcelDKP;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Mata_kuliah;



class ExcelDKPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChartExcelDKP $chart)
    {
        $idToMatch = 'PTSK6103';
        $mataKuliahInfo = Mata_kuliah::where('kode_MK', $idToMatch)->get();

        $nilai = ExcelDKP::all();
        if(request()->ajax()) {
            return datatables()->of(ExcelDKP::select('*'))
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.excel.exceldkp', ['chart' => $chart->build(), 'mataKuliahInfo' => $mataKuliahInfo], compact('nilai'));
    }



    public function ExcelDKPimport(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMatkul', $namaFile);

        Excel::import(new ExcelDKPimport, public_path('/DataMatkul/'.$namaFile));
        return redirect('/matakuliah/PTSK6103');
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
     * @param  \App\Models\ExcelDKP  $excelDKP
     * @return \Illuminate\Http\Response
     */
    public function show(ExcelDKP $excelDKP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExcelDKP  $excelDKP
     * @return \Illuminate\Http\Response
     */
    public function edit(ExcelDKP $excelDKP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExcelDKP  $excelDKP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExcelDKP $excelDKP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExcelDKP  $excelDKP
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExcelDKP $excelDKP)
    {
        //
    }
}
