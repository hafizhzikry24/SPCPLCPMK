<?php

namespace App\Charts;

use App\Models\NilaiMahasiswa;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartCPMK
{
    protected $pieChartCPMK;

    public function __construct(LarapexChart $pieChartCPMK)
    {
        $this->pieChartCPMK = $pieChartCPMK;
    }

    public function build($selectedCpmk, $kode_MK): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Fetch data based on your logic (replace this with your actual data fetching logic)
        // $remidi = NilaiMahasiswa::where('cpmk' . $selectedCpmk, '<', 60)->count();
        $remidi = NilaiMahasiswa::where('id_matkul', $kode_MK)
    ->where('cpmk' . $selectedCpmk, '<', 60)
    ->count();
    $lulus = NilaiMahasiswa::where('id_matkul', $kode_MK)
    ->where('cpmk' . $selectedCpmk, '>=', 60)
    ->count();
    $tidaklulus = NilaiMahasiswa::where('id_matkul', $kode_MK)
    ->where('outcome', 'TIDAK LULUS')
    ->count();
        // $lulus = NilaiMahasiswa::where('cpmk' . $selectedCpmk, '>=', 60)->count();
        // $tidaklulus = NilaiMahasiswa::where('outcome', 'TIDAK LULUS')->count();
        $labels = ['Tidak Lulus', 'Remidi CPMK', 'Lulus'];

        return $this->pieChartCPMK->pieChart()
            ->setTitle('Distribusi Nilai CPMK Mahasiswa')
            ->setSubtitle('Berdasarkan CPMK yang dipilih')
            ->setColors(['#ff455f', '#feb019', '#00E396'])
            ->addData([$tidaklulus, $remidi, $lulus])
            ->setLabels($labels);
    }
}
