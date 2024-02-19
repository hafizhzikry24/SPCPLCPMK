<?php

namespace App\Charts;

use App\Models\NilaiMahasiswa;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartCPL
{
    protected $pieChartCPL;


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
            ->setTitle('Distribusi Nilai CPL')
            ->setSubtitle('Berdasarkan CPL yang dipilih')
            ->setColors(['#ff455f', '#feb019', '#00E396', '#80effe'])
            ->addData([$kurang, $cukup, $baik, $unggul])
            ->setLabels($labels);
    }
}
