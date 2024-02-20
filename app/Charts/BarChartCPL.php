<?php

namespace App\Charts;

use App\Models\Mata_kuliah;
use App\Models\NilaiMahasiswa;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class BarChartCPL
{
    protected $barChartCPL;

    public function __construct(LarapexChart $barChartCPL)
    {
        $this->barChartCPL = $barChartCPL;
    }

    public function build($kode_MK): \ArielMejiaDev\LarapexCharts\BarChart
    {

        // Fetch the mata_kuliah model for the given $kode_MK
        $mataKuliah = Mata_kuliah::where("kode_MK", $kode_MK)->first();

        // Check if the model and cpl column exist
        if ($mataKuliah && isset($mataKuliah->cpl)) {
            // Convert the cpl column value to an array
            $cplArray = json_decode($mataKuliah->cpl, true);
            // dd($cplArray);

            // Ensure uniqueness in the cpl values
            $uniqueCplArray = [];

            $uniqueCplArray = array_unique(array_map('intval', $cplArray));

            // dd($uniqueCplArray);

            // Generate X-axis labels based on the unique cpl values
            $xAxisLabels = array_map(function ($cpl) {
                return "CPL " . $cpl;
            }, $uniqueCplArray);

                // Initialize an array to store data for each grade
            $gradeData = [];

            // Iterate through unique CPL values
            foreach ($uniqueCplArray as $cpl) {
                // Cast $cpl to integer to ensure correct key in $gradeData
                $cpl = (int)$cpl;

                // Query to count occurrences for each grade in the corresponding column
                $unggul = NilaiMahasiswa::where('id_matkul', $kode_MK)
                    ->whereRaw("cpl$cpl = 4")
                    ->count();
                    // dd($unggul);
                $baik = NilaiMahasiswa::where('id_matkul', $kode_MK)
                    ->where("cpl" . $cpl, 3)
                    ->count();
                $cukup = NilaiMahasiswa::where('id_matkul', $kode_MK)
                    ->where("cpl" . $cpl, 2)
                    ->count();
                $kurang = NilaiMahasiswa::where('id_matkul', $kode_MK)
                    ->where("cpl" . $cpl, 1)
                    ->count();

                // Store the counts in the $gradeData array for each CPL
                $gradeData[$cpl] = [
                    'unggul' => $unggul,
                    'baik' => $baik,
                    'cukup' => $cukup,
                    'kurang' => $kurang,
                ];

                // dd($gradeData);

                // Calculate percentages
                $total = $unggul + $baik + $cukup + $kurang;
                $percentageUnggul = ($total > 0) ? ($unggul / $total) * 100 : 0;
                $percentageBaik = ($total > 0) ? ($baik / $total) * 100 : 0;
                $percentageCukup = ($total > 0) ? ($cukup / $total) * 100 : 0;
                $percentageKurang = ($total > 0) ? ($kurang / $total) * 100 : 0;
            }


        } else {
            // Default labels if mata_kuliah or cpl column not found
            $xAxisLabels = array_map(function ($cpl) {
                return "CPL " . $cpl;
            }, range(1, 12));
        }

        dd($gradeData);
        dd($percentageUnggul);
        return $this->barChartCPL->barChart()
            ->setTitle('Distribusi Nilai CPL Mahasiswa dalam Persen')
            ->setSubtitle('Berdasarkan CPL Mata Kuliah')
            ->addData('Unggul (A) %', [$percentageUnggul])
            ->addData('Baik (B) %', [$percentageBaik])
            ->addData('Cukup (C) %', [$percentageCukup])
            ->addData('Kurang (D) %', [$percentageKurang])
            ->setFontFamily('sans-serif')
            ->setGrid()
            ->setXAxis($xAxisLabels);
    }
}
