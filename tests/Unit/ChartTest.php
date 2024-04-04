<?php

namespace Tests\Unit;

use App\Charts\BarChartCPL;
use App\Http\Controllers\ChartAllController;
use App\Models\NilaiMahasiswa;
use App\Charts\ChartAll;
use App\Charts\PieChartCPL;
use App\Charts\PieChartCPMK;
use ArielMejiaDev\LarapexCharts\BarChart;
use ArielMejiaDev\LarapexCharts\PieChart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Tests\TestCase;
use Mockery;

class ChartAllControllerTest extends TestCase
{
    /**
     * Test the index method of ChartAllController.
     *
     * @return void
     */
    public function testChartAll()
    {
        // Mock NilaiMahasiswa model
        $nilaiMahasiswaMock = Mockery::mock(NilaiMahasiswa::class);
        $nilaiMahasiswaMock->shouldReceive('all')->andReturn(new Collection());

        // Mock Request
        $request = new Request();

        // Mock ChartAll
        $chartAllMock = Mockery::mock(ChartAll::class);
        $chartAllMock->shouldReceive('build')->andReturn('mocked_chart_data');

        // Create an instance of ChartAllController
        $controller = new ChartAllController();

        // Call the index method
        $response = $controller->index($request, $chartAllMock);

        // Assert that the view is returned
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);

        // Assert that the necessary data is passed to the view
        $this->assertArrayHasKey('nilai_mahasiswa', $response->getData());
        $this->assertArrayHasKey('uniqueSemesters', $response->getData());
        $this->assertArrayHasKey('uniqueTahunAkademik', $response->getData());
        $this->assertArrayHasKey('barChartCplAll', $response->getData());
        $this->assertArrayHasKey('selectedSemester', $response->getData());
        $this->assertArrayHasKey('selectedTahunAkademik', $response->getData());
    }

    public function testBarChartCPLBuild()
    {
        // Create an instance of BarChartCPL
        $barChartCPL = new BarChartCPL(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class));

        $tahun_akademik = '2023-2024';
        $semester = 'Ganjil';
        $kode_MK = 'PTSKTEST';
        // Call the build method
        $result = $barChartCPL->build($tahun_akademik, $semester, $kode_MK);
        // Assert the result or behavior
        // For example, you can assert that the result is an instance of a specific class
        $this->assertInstanceOf(\ArielMejiaDev\LarapexCharts\LarapexChart::class, $result);
        // Or you can assert specific properties or behavior of the result
    }

    /**
     * Test the build method of PieChartCPL class.
     *
     * @return void
     */
    public function testPieChartCPLBuild()
    {
        $selectedCpl = 4;
        $tahun_akademik = '2023-2024';
        $semester = 'Ganjil';
        $kode_MK = 'PTSKTEST';
        // Create an instance of PieChartCPL
        $pieChartCPL = new PieChartCPL(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedCpl);

        // Call the build method
        $result = $pieChartCPL->build($selectedCpl, $tahun_akademik, $semester, $kode_MK);

        // Assert the result or behavior
        // For example, you can assert that the result is an instance of a specific class
        $this->assertInstanceOf(\ArielMejiaDev\LarapexCharts\LarapexChart::class, $result);
        // Or you can assert specific properties or behavior of the result
    }

    /**
     * Test the build method of PieChartCPMK class.
     *
     * @return void
     */
    public function testPieChartCPMKBuild()
    {
        $selectedCpmk = 4;
        $tahun_akademik = '2023-2024';
        $semester = 'Ganjil';
        $kode_MK = 'PTSKTEST';
        // Create an instance of PieChartCPMK
        $pieChartCPMK = new PieChartCPMK(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedCpmk);

        // Call the build method
        $result = $pieChartCPMK->build($selectedCpmk, $tahun_akademik, $semester, $kode_MK);

        // Assert the result or behavior
        // For example, you can assert that the result is an instance of a specific class
        $this->assertInstanceOf(\ArielMejiaDev\LarapexCharts\LarapexChart::class, $result);
        // Or you can assert specific properties or behavior of the result
    }
}
