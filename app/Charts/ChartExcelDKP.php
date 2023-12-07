<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\ExcelDKP;

class ChartExcelDKP
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
                \App\Models\ExcelDKP::where('cpl2', 4)->count(),
                \App\Models\ExcelDKP::where('cpl3', 4)->count(),
                \App\Models\ExcelDKP::where('cpl5', 4)->count(),
                \App\Models\ExcelDKP::where('cpl6', 4)->count(),
                \App\Models\ExcelDKP::where('cpl7', 4)->count(),
                \App\Models\ExcelDKP::where('cpl9', 4)->count(),
            ])
            ->addData('3', [
                \App\Models\ExcelDKP::where('cpl2', 3)->count(),
                \App\Models\ExcelDKP::where('cpl3', 3)->count(),
                \App\Models\ExcelDKP::where('cpl5', 3)->count(),
                \App\Models\ExcelDKP::where('cpl6', 3)->count(),
                \App\Models\ExcelDKP::where('cpl7', 3)->count(),
                \App\Models\ExcelDKP::where('cpl9', 3)->count(),
            ])
            ->addData('2', [
                \App\Models\ExcelDKP::where('cpl2', 2)->count(),
                \App\Models\ExcelDKP::where('cpl3', 2)->count(),
                \App\Models\ExcelDKP::where('cpl5', 2)->count(),
                \App\Models\ExcelDKP::where('cpl6', 2)->count(),
                \App\Models\ExcelDKP::where('cpl7', 2)->count(),
                \App\Models\ExcelDKP::where('cpl9', 2)->count(),
            ])
            ->addData('1', [
                \App\Models\ExcelDKP::where('cpl2', 1)->count(),
                \App\Models\ExcelDKP::where('cpl3', 1)->count(),
                \App\Models\ExcelDKP::where('cpl5', 1)->count(),
                \App\Models\ExcelDKP::where('cpl6', 1)->count(),
                \App\Models\ExcelDKP::where('cpl7', 1)->count(),
                \App\Models\ExcelDKP::where('cpl9', 1)->count(),
            ])
            ->setXAxis(['CPL 2', 'CPL 3', 'CPL 5', 'CPL 5', 'CPL 7','CPL 9' ]);
    }
}
