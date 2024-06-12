<?php

namespace App\Charts;

use App\Models\NilaiMahasiswa;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartCPMK
{
    protected $pieChartCPMK;
    protected $selectedCpmk;

    public function __construct(LarapexChart $pieChartCPMK)
    {
        $this->pieChartCPMK = $pieChartCPMK;    
    }

    public function build($selectedCpmk, $tahun_akademik, $semester,  $kode_MK): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Fetch data based on your logic (replace this with your actual data fetching logic)
        $remidi = NilaiMahasiswa::where('tahun_akademik_matkul', $tahun_akademik)
        ->where('semester_matkul', $semester)
        ->where('id_matkul', $kode_MK)
        ->where('cpmk' . $selectedCpmk, '<', 60)
        ->count();
        $lulus = NilaiMahasiswa::where('tahun_akademik_matkul', $tahun_akademik)
        ->where('semester_matkul', $semester)
        ->where('id_matkul', $kode_MK)
        ->where('outcome' , "LULUS")
        ->count();
        $tidaklulus = NilaiMahasiswa::where('tahun_akademik_matkul', $tahun_akademik)
        ->where('semester_matkul', $semester)
        ->where('id_matkul', $kode_MK)
        ->where('outcome' , "TIDAK LULUS")
        ->count();
        $labels = ['Tidak Lulus', 'Remidi CPMK', 'Lulus'];

        return $this->pieChartCPMK->pieChart()
            ->setColors(['#ff455f', '#feb019', '#00E396'])
            ->addData([$tidaklulus, $remidi, $lulus])
            ->setFontFamily('sans-serif')
            ->setLabels($labels);
    }
}
