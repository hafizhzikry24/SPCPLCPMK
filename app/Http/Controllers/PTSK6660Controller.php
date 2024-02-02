<?php

namespace App\Http\Controllers;

use App\Charts\BarChartPTSK6660;
use App\Charts\PieChartPTSK6660;
use App\Imports\ExcelPTSK6660;
use App\Models\Mata_kuliah;
use App\Models\PTSK6660;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PTSK6660Controller extends Controller
{

    public function index(PieChartPTSK6660 $PieChart, BarChartPTSK6660 $BarChart, Request $request)
    {
        $selectedCpmk = $request->input('selectedCpmk', 1); // Default to CPMK 1 if not provided

        $idToMatch = 'PTSK6660';
        $mataKuliahInfo = Mata_kuliah::where('kode_MK', $idToMatch)->get();

        $nilai = PTSK6660::all();

        $PieChart = new PieChartPTSK6660(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedCpmk);

        if ($request->ajax()) {
            return datatables()->of(PTSK6660::select('*'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('content.excel.ptsk6660', [
            'PieChart' => $PieChart->build($selectedCpmk),
            'BarChart' => $BarChart->build(),
            'mataKuliahInfo' => $mataKuliahInfo,
            'nilai' => $nilai,
            'selectedCpmk' => $selectedCpmk,
        ]);
    }


    public function ExcelPTSK6660(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMatkul', $namaFile);

        Excel::import(new ExcelPTSK6660, public_path('/DataMatkul/'.$namaFile));
        return redirect('/matakuliah/PTSK6660');
    }
}
