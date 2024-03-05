<?php

namespace App\Charts;

use Illuminate\Support\Facades\DB;
use App\Models\NilaiMahasiswa;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartCPL
{
    protected $pieChartCPL;
    protected $selectedCpl;


    public function __construct(LarapexChart $pieChartCPL)
    {
        $this->pieChartCPL = $pieChartCPL;
    }

    public function build($selectedCpl, $tahun_akademik, $semester, $kode_MK): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // dd($tahun_akademik, $kode_MK, $semester, $selectedCpl);
        // DB::enableQueryLog();
        $unggul = NilaiMahasiswa::where('tahun_akademik_matkul', $tahun_akademik)
        ->where('semester_matkul', $semester)
        ->where('id_matkul', $kode_MK)
        ->where('cpl' . $selectedCpl, 4)
        ->count();
        // dd(DB::getQueryLog());
        $baik = NilaiMahasiswa::where('tahun_akademik_matkul', $tahun_akademik)
        ->where('semester_matkul', $semester)
        ->where('id_matkul', $kode_MK)
        ->where('cpl' . $selectedCpl, 3)
        ->count();
        $cukup = NilaiMahasiswa::where('tahun_akademik_matkul', $tahun_akademik)
        ->where('semester_matkul', $semester)
        ->where('id_matkul', $kode_MK)
        ->where('cpl' . $selectedCpl, 2)
        ->count();
        $kurang = NilaiMahasiswa::where('tahun_akademik_matkul', $tahun_akademik)
        ->where('semester_matkul', $semester)
        ->where('id_matkul', $kode_MK)
        ->where('cpl' . $selectedCpl, 1)
        ->count();


        $labels = ['Kurang (D)', 'Cukup (C)', 'Baik (B)', 'Unggul (A)'];

        return $this->pieChartCPL->pieChart()
            ->setColors(['#ff455f', '#feb019', '#00E396', '#008FFB'])
            ->addData([$kurang, $cukup, $baik, $unggul])
            ->setFontFamily('sans-serif')
            ->setLabels($labels);
    }
}
