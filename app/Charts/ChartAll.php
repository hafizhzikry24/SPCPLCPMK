<?php

namespace App\Charts;

use App\Models\Mata_kuliah;
use App\Models\NilaiMahasiswa;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartAll
{
    protected $barChartCplAll;

    public function __construct(LarapexChart $barChartCplAll)
    {
        $this->barChartCplAll = $barChartCplAll;
    }

    public function build($selectedSemester): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $gradeData = [];

        // Check if the model exists
        if ($mataKuliah = Mata_kuliah::all()) {
            // Define the range of CPL columns (cpl1, cpl2, ..., cpl9)
            $cplColumns = range(1, 9);

            // Generate X-axis labels based on the CPL columns
            $xAxisLabels = array_map(function ($cpl) {
                return "CPL " . $cpl;
            }, $cplColumns);

            foreach ($cplColumns as $cpl) {
                // Check if selectedSemester is not null, then filter by semester
                if ($selectedSemester === 999) {
                    $cpl = (int)$cpl;
                // Query to count occurrences for each grade in the corresponding column
                $unggul = NilaiMahasiswa::where("cpl" . $cpl, 4)
                ->count();
                $baik = NilaiMahasiswa::where("cpl" . $cpl, 3)
                ->count();
                $cukup = NilaiMahasiswa::where("cpl" . $cpl, 2)
                ->count();
                $kurang = NilaiMahasiswa::where("cpl" . $cpl, 1)
                ->count();

                // Calculate total counts for percentages
                 $total = $unggul + $baik + $cukup + $kurang;
                // Calculate percentages
                $percentageUnggul = ($total > 0) ? ($unggul / $total) * 100 : 0;
                $percentageBaik = ($total > 0) ? ($baik / $total) * 100 : 0;
                $percentageCukup = ($total > 0) ? ($cukup / $total) * 100 : 0;
                $percentageKurang = ($total > 0) ? ($kurang / $total) * 100 : 0;

                $gradeData["cpl$cpl"] = [
                    'unggul' => $unggul,
                    'baik' => $baik,
                    'cukup' => $cukup,
                    'kurang' => $kurang,
                    'percentageUnggul' => $percentageUnggul,
                    'percentageBaik' => $percentageBaik,
                    'percentageCukup' => $percentageCukup,
                    'percentageKurang' => $percentageKurang,
                ];
                } else {
                $cpl = (int)$cpl;
                // Count occurrences for each grade in the corresponding column
                $unggul = NilaiMahasiswa::where('semester', $selectedSemester)
                    ->where("cpl" . $cpl, 4)
                    ->count();
                $baik = NilaiMahasiswa::where('semester', $selectedSemester)
                    ->where("cpl" . $cpl, 3)
                    ->count();
                $cukup = NilaiMahasiswa::where('semester', $selectedSemester)
                    ->where("cpl" . $cpl, 2)
                    ->count();
                $kurang = NilaiMahasiswa::where('semester', $selectedSemester)
                    ->where("cpl" . $cpl, 1)
                    ->count();

                // Calculate total counts for percentages
                $total = $unggul + $baik + $cukup + $kurang;

                // Calculate percentages
                $percentageUnggul = ($total > 0) ? ($unggul / $total) * 100 : 0;
                $percentageBaik = ($total > 0) ? ($baik / $total) * 100 : 0;
                $percentageCukup = ($total > 0) ? ($cukup / $total) * 100 : 0;
                $percentageKurang = ($total > 0) ? ($kurang / $total) * 100 : 0;

                // Store the counts and percentages in the $gradeData array for each CPL
                $gradeData["cpl$cpl"] = [
                    'unggul' => $unggul,
                    'baik' => $baik,
                    'cukup' => $cukup,
                    'kurang' => $kurang,
                    'percentageUnggul' => $percentageUnggul,
                    'percentageBaik' => $percentageBaik,
                    'percentageCukup' => $percentageCukup,
                    'percentageKurang' => $percentageKurang,
                ];
            }
        }
            // Default labels if mata_kuliah not found
            $xAxisLabels = array_map(function ($cpl) {
                return "CPL " . $cpl;
            }, range(1, 9));
            // Default percentages
            $percentageUnggul = 0;
            $percentageBaik = 0;
            $percentageCukup = 0;
            $percentageKurang = 0;
        }

        // dd($gradeData);
        return $this->barChartCplAll->barChart()
            ->addData('Unggul (A) %', array_values(array_column($gradeData, 'percentageUnggul')))
            ->addData('Baik (B) %', array_values(array_column($gradeData, 'percentageBaik')))
            ->addData('Cukup (C) %', array_values(array_column($gradeData, 'percentageCukup')))
            ->addData('Kurang (D) %', array_values(array_column($gradeData, 'percentageKurang')))
            ->setFontFamily('sans-serif')
            ->setGrid()
            ->setXAxis($xAxisLabels);
    }
}
