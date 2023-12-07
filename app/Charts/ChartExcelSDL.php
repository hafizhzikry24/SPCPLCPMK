<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartExcelSDL
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Grafik CPL')
            ->setSubtitle('Perbandingan Nilai')
            ->addData('4', [
                \App\Models\excelsdl::where('cpl3', 4)->count(),
            ])
            ->addData('3', [
                \App\Models\excelsdl::where('cpl3', 3)->count(),
            ])
            ->addData('2', [
                \App\Models\excelsdl::where('cpl3', 2)->count(),
            ])
            ->addData('1', [
                \App\Models\excelsdl::where('cpl3', 1)->count(),
            ])
            ->setXAxis(['CPL 3']);
    }
}
