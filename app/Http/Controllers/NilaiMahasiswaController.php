<?php

namespace App\Http\Controllers;

use App\Charts\BarChartCPL;
use App\Charts\PieChartCPMK;
use App\Charts\PieChartCPL;
use App\Imports\ExcelImportNilaiMahasiswa;
use App\Models\Mata_kuliah;
use App\Models\NilaiMahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;

class NilaiMahasiswaController extends Controller
{
    public function view(Request $request, $kode_MK, PieChartCPMK $pieChartCPMK, PieChartCPL $pieChartCPL, BarChartCPL $barChartCPL)
    {
        $selectedCpmk = $request->input('selectedCpmk', 1);
        $pieChartCPMK = new PieChartCPMK(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class));

        $matakuliah_info = Mata_kuliah::where("kode_MK", $kode_MK)->first();

        $cplColumns = json_decode($matakuliah_info->cpl, true);
        $matkul_id = $kode_MK;

        return view('content.excel.nilai_mahasiswa', [
            'matakuliah_info' => $matakuliah_info,
            'cplColumns' => $cplColumns,
            'matkul_id' => $matkul_id,
            'selectedCpmk' => $selectedCpmk,
            'pieChartCPMK' => $pieChartCPMK->build($selectedCpmk),
            'pieChartCPL' => $pieChartCPL->build(),
            'barChartCPL' => $barChartCPL->build()
        ]);
    }


    public function datatables(Request $request, $kode_MK)
    {
        if ($request->ajax()) {
            $matakuliah_info = Mata_kuliah::where("kode_MK", $kode_MK)->first();

            if (!$matakuliah_info) {
                return response()->json(['error' => 'Matakuliah not found.'], 404);
            }

            $cpmkCount = count(explode('. ', $matakuliah_info->cpmk));

            $data = NilaiMahasiswa::where('id_matkul', $matakuliah_info->kode_MK)->get();


            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('cpmkCount', function ($row) use ($cpmkCount) {
                    return $cpmkCount;
                })
                ->make(true);
        }
    }

    public function inputexcel(Request $request, $matkul_id){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMatkul', $namaFile);

        Excel::import(new ExcelImportNilaiMahasiswa, public_path('/DataMatkul/'.$namaFile));
        return redirect()->route('mata_kuliah', ['matkul_id' => $matkul_id]);
    }
}
