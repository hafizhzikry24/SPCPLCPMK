<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PieChartCPMK
{
    protected $pieChartCPMK;

    public function __construct(LarapexChart $pieChartCPMK)
    {
        $this->pieChartCPMK = $pieChartCPMK;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->pieChartCPMK->pieChart()
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->addData([40, 50, 30])
            ->setLabels(['Player 7', 'Player 10', 'Player 9']);
    }
}
