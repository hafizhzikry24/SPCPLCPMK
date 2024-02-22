<?php

namespace App\Http\Controllers;

use App\Charts\ChartAll;
use App\Models\Mata_kuliah;
use Illuminate\Http\Request;

class ChartAllController extends Controller
{
    public function index(Request $request, ChartAll $barChartCplAll)
    {
        $matakuliah_info = Mata_kuliah::all()->first();
        $selectedSemester = $request->input('selectedSemester', 13);

        $barChartCplAll = new ChartAll(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedSemester);

        return view('content.rekap', [
            'matakuliah_info' => $matakuliah_info,
            'barChartCplAll' => $barChartCplAll->build($selectedSemester),
            'selectedSemester' => $selectedSemester
        ]);
    }
}
