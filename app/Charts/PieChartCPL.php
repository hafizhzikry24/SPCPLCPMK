<?php

namespace App\Charts;

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

    public function build($selectedCpl, $kode_MK): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $unggul = NilaiMahasiswa::where('id_matkul', $kode_MK)
        ->where('cpl' . $selectedCpl, 4)
        ->count();
        $baik = NilaiMahasiswa::where('id_matkul', $kode_MK)
        ->where('cpl' . $selectedCpl, 3)
        ->count();
        $cukup = NilaiMahasiswa::where('id_matkul', $kode_MK)
        ->where('cpl' . $selectedCpl, 2)
        ->count();
        $kurang = NilaiMahasiswa::where('id_matkul', $kode_MK)
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
