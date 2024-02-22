<?php

namespace App\Charts;

use App\Models\Mata_kuliah;
use App\Models\NilaiMahasiswa;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartAll
{
    protected $barChartCplAll;
    protected $selectedSemester;

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
                // Query to count occurrences for each grade in the corresponding column
                $query = NilaiMahasiswa::query();

                // Check if selectedSemester is not null, then filter by semester
                if ($selectedSemester !== 13) {
                    $query->where('semester', $selectedSemester);
                }

                // Count occurrences for each grade in the corresponding column
                $gradeCounts = $query->selectRaw("SUM(cpl$cpl = 4) as unggul")
                    ->selectRaw("SUM(cpl$cpl = 3) as baik")
                    ->selectRaw("SUM(cpl$cpl = 2) as cukup")
                    ->selectRaw("SUM(cpl$cpl = 1) as kurang")
                    ->first();

                // Calculate total counts for percentages
                $total = $gradeCounts->unggul + $gradeCounts->baik + $gradeCounts->cukup + $gradeCounts->kurang;

                // Calculate percentages
                $percentageUnggul = ($total > 0) ? ($gradeCounts->unggul / $total) * 100 : 0;
                $percentageBaik = ($total > 0) ? ($gradeCounts->baik / $total) * 100 : 0;
                $percentageCukup = ($total > 0) ? ($gradeCounts->cukup / $total) * 100 : 0;
                $percentageKurang = ($total > 0) ? ($gradeCounts->kurang / $total) * 100 : 0;

                // Store the counts and percentages in the $gradeData array for each CPL
                $gradeData["cpl$cpl"] = [
                    'unggul' => $gradeCounts->unggul,
                    'baik' => $gradeCounts->baik,
                    'cukup' => $gradeCounts->cukup,
                    'kurang' => $gradeCounts->kurang,
                    'percentageUnggul' => $percentageUnggul,
                    'percentageBaik' => $percentageBaik,
                    'percentageCukup' => $percentageCukup,
                    'percentageKurang' => $percentageKurang,
                ];
            }
        } else {
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
            ->setXAxis($xAxisLabels);
    }
}
