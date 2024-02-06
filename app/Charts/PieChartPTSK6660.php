<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartPTSK6660
{
    protected $PieChart;
    protected $selectedCpmk;

    public function __construct(LarapexChart $PieChart)
    {
        $this->PieChart = $PieChart;
    }

    public function build($selectedCpmk): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $chartTitle = 'Remedial Status for CPMK ' . $selectedCpmk;

        return $this->PieChart->pieChart()
            ->setTitle($chartTitle)
            ->setSubtitle('Perhitungan Remedial Status dengan Pie Chart')
            ->addData([
                \App\Models\PTSK6660::where('outcome', 'TIDAK LULUS')->count(),
                \App\Models\PTSK6660::where('cpmk' . $selectedCpmk, '<', 60)->count(),
                \App\Models\PTSK6660::where('cpmk' . $selectedCpmk, '>=', 60)->count()
            ])
            ->setColors(['#ff455f', '#feb019', '#00E396'])
            ->setLabels(['Tidak Lulus', 'Remidi CPMK', 'Lulus',]);
    }
}
