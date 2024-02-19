<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class BarChartPTSK6660
{
    protected $BarChart;

    public function __construct(LarapexChart $BarChart)
    {
        $this->BarChart = $BarChart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        

        return $this->BarChart->barChart()
            ->setTitle('Grafik CPL')
            ->setSubtitle('Perbandingan Nilai CPL')
            ->addData('4', [
                \App\Models\PTSK6660::where('cpl2', 4)->count(),
                \App\Models\PTSK6660::where('cpl3', 4)->count(),
                \App\Models\PTSK6660::where('cpl4', 4)->count(),
                \App\Models\PTSK6660::where('cpl6', 4)->count(),
            ])
            ->addData('3', [
                \App\Models\PTSK6660::where('cpl2', 3)->count(),
                \App\Models\PTSK6660::where('cpl3', 3)->count(),
                \App\Models\PTSK6660::where('cpl4', 3)->count(),
                \App\Models\PTSK6660::where('cpl6', 3)->count(),
            ])
            ->addData('2', [
                \App\Models\PTSK6660::where('cpl2', 2)->count(),
                \App\Models\PTSK6660::where('cpl3', 2)->count(),
                \App\Models\PTSK6660::where('cpl4', 2)->count(),
                \App\Models\PTSK6660::where('cpl6', 2)->count(),
            ])
            ->addData('1', [
                \App\Models\PTSK6660::where('cpl2', 1)->count(),
                \App\Models\PTSK6660::where('cpl3', 1)->count(),
                \App\Models\PTSK6660::where('cpl4', 1)->count(),
                \App\Models\PTSK6660::where('cpl6', 1)->count(),
            ])
            ->setXAxis(['CPL 2', 'CPL 3', 'CPL 4', 'CPL 6']);
    }
}
