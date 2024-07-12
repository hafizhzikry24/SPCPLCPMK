<?php

namespace App\Http\Controllers;

use App\Charts\ChartAll;
use App\Models\NilaiMahasiswa;
use Illuminate\Http\Request;

class ChartAllController extends Controller
{
    public function index(Request $request, ChartAll $barChartCplAll)
    {
        $nilai_mahasiswa = NilaiMahasiswa::all();
        // dd($nilai_mahasiswa);
        $uniqueSemesters = $nilai_mahasiswa->unique('semester_matkul')->pluck('semester_matkul');
        // dd($uniqueSemesters);
        $uniqueTahunAkademik = $nilai_mahasiswa->unique('tahun_akademik_matkul')->pluck('tahun_akademik_matkul')->sort();
        // dd($uniqueTahunAkademik);

        $selectedTahunAkademik = $request->input('selectedTahunAkademik', 999);
        $selectedSemester = $request->input('selectedSemester', 999);

        $barChartCplAll = new ChartAll(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedSemester, $selectedTahunAkademik);

        return view('content.rekap', [
            'nilai_mahasiswa' => $nilai_mahasiswa,
            'uniqueSemesters' => $uniqueSemesters,
            'uniqueTahunAkademik' => $uniqueTahunAkademik,
            'barChartCplAll' => $barChartCplAll->build($selectedTahunAkademik, $selectedSemester),
            'selectedSemester' => $selectedSemester,
            'selectedTahunAkademik' => $selectedTahunAkademik
        ]);
    }
}
