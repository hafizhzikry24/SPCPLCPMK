<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartSDL
{
    protected $piechart;

    public function __construct(LarapexChart $piechart)
    {
        $this->piechart = $piechart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $data = [
            ['x' => '4', 'y' => \App\Models\excelsdl::where('cpl3', 4)->count()],
            ['x' => '3', 'y' => \App\Models\excelsdl::where('cpl3', 3)->count()],
            ['x' => '2', 'y' => \App\Models\excelsdl::where('cpl3', 2)->count()],
            ['x' => '1', 'y' => \App\Models\excelsdl::where('cpl3', 1)->count()],
        ];

        return $this->piechart->pieChart()
            ->setTitle('CPL menggunakan Pie Chart')
            ->setSubtitle('Perbandingan Nilai')
            ->addData([
                \App\Models\excelsdl::where('cpl3', '=', 4)->count(),
                \App\Models\excelsdl::where('cpl3', '=', 3)->count(),
                \App\Models\excelsdl::where('cpl3', '=', 2)->count(),
                \App\Models\excelsdl::where('cpl3', '=', 1)->count()
            ])
            ->setLabels(['4', '3', '2', '1']);
    }

}
