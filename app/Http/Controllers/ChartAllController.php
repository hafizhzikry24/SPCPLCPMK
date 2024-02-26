<?php

namespace App\Http\Controllers;

use App\Charts\ChartAll;
use App\Models\NilaiMahasiswa;
use Illuminate\Http\Request;

class ChartAllController extends Controller
{
    public function index(Request $request, ChartAll $barChartCplAll)
    {
        $nilai_mahasiswa = NilaiMahasiswa::all()->first();
        $selectedSemester = $request->input('selectedSemester', 999);

        $barChartCplAll = new ChartAll(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedSemester);

        return view('content.rekap', [
            'nilai_mahasiswa' => $nilai_mahasiswa,
            'barChartCplAll' => $barChartCplAll->build($selectedSemester),
            'selectedSemester' => $selectedSemester
        ]);
    }
}
