<?php

namespace App\Charts;

use App\Models\ExcelDKP;
use App\Models\ExcelSDL;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartAll
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = [
            'cpl2' => [
                '4' => ExcelDKP::where('cpl2', 4)->count(),
                '3' => ExcelDKP::where('cpl2', 3)->count(),
                '2' => ExcelDKP::where('cpl2', 2)->count(),
                '1' => ExcelDKP::where('cpl2', 1)->count(),
            ],
            'cpl3' => [
                '4' => ExcelDKP::where('cpl3', 4)->count() + ExcelSDL::where('cpl3', 4)->count(),
                '3' => ExcelDKP::where('cpl3', 3)->count() + ExcelSDL::where('cpl3', 3)->count(),
                '2' => ExcelDKP::where('cpl3', 2)->count() + ExcelSDL::where('cpl3', 2)->count(),
                '1' => ExcelDKP::where('cpl3', 1)->count() + ExcelSDL::where('cpl3', 1)->count(),
            ],
            'cpl5' => [
                '4' => ExcelDKP::where('cpl5', 4)->count(),
                '3' => ExcelDKP::where('cpl5', 3)->count(),
                '2' => ExcelDKP::where('cpl5', 2)->count(),
                '1' => ExcelDKP::where('cpl5', 1)->count(),
            ],
            'cpl6' => [
                '4' => ExcelDKP::where('cpl6', 4)->count(),
                '3' => ExcelDKP::where('cpl6', 3)->count(),
                '2' => ExcelDKP::where('cpl6', 2)->count(),
                '1' => ExcelDKP::where('cpl6', 1)->count(),
            ],
            'cpl7' => [
                '4' => ExcelDKP::where('cpl7', 4)->count(),
                '3' => ExcelDKP::where('cpl7', 3)->count(),
                '2' => ExcelDKP::where('cpl7', 2)->count(),
                '1' => ExcelDKP::where('cpl7', 1)->count(),
            ],
            'cpl9' => [
                '4' => ExcelDKP::where('cpl9', 4)->count(),
                '3' => ExcelDKP::where('cpl9', 3)->count(),
                '2' => ExcelDKP::where('cpl9', 2)->count(),
                '1' => ExcelDKP::where('cpl9', 1)->count(),
            ],
            'cpl1' => [
                '4' => ExcelDKP::where('cpl3', 4)->count() + ExcelSDL::where('cpl3', 4)->count(),
                '3' => ExcelDKP::where('cpl3', 3)->count() + ExcelSDL::where('cpl3', 3)->count(),
                '2' => ExcelDKP::where('cpl3', 2)->count() + ExcelSDL::where('cpl3', 2)->count(),
                '1' => ExcelDKP::where('cpl3', 1)->count() + ExcelSDL::where('cpl3', 1)->count(),
            ],
        ];

        return $this->chart->barChart()
            ->setTitle('Grafik CPL')
            ->setSubtitle('Perbandingan Nilai')
            ->addData('4', [
                $data['cpl1']['4'],
                $data['cpl2']['4'],
                $data['cpl3']['4'],
                $data['cpl5']['4'],
                $data['cpl6']['4'],
                $data['cpl7']['4'],
                $data['cpl9']['4'],
            ])
            ->addData('3', [
                $data['cpl1']['3'],
                $data['cpl2']['3'],
                $data['cpl3']['3'],
                $data['cpl5']['3'],
                $data['cpl6']['3'],
                $data['cpl7']['3'],
                $data['cpl9']['3'],
            ])
            ->addData('2', [
                $data['cpl1']['2'],
                $data['cpl2']['2'],
                $data['cpl3']['2'],
                $data['cpl5']['2'],
                $data['cpl6']['2'],
                $data['cpl7']['2'],
                $data['cpl9']['2'],
            ])
            ->addData('1', [
                $data['cpl1']['1'],
                $data['cpl2']['1'],
                $data['cpl3']['1'],
                $data['cpl5']['1'],
                $data['cpl6']['1'],
                $data['cpl7']['1'],
                $data['cpl9']['1'],
            ])
            ->setXAxis(['CPL 1', 'CPL 2', 'CPL 3', 'CPL 5', 'CPL 5', 'CPL 7', 'CPL 9']);
    }
}
