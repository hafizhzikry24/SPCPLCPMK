<?php

namespace App\Http\Controllers;

use App\Charts\BarChartCPL;
use App\Charts\PieChartCPMK;
use App\Charts\PieChartCPL;
use App\Imports\ExcelImportNilaiMahasiswa;
use App\Models\Mata_kuliah;
use App\Models\Evaluasi_cpmk;
use App\Models\NilaiMahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class NilaiMahasiswaController extends Controller
{
    public function view(Request $request, $tahun_akademik, $semester, $kode_MK, PieChartCPMK $pieChartCPMK, PieChartCPL $pieChartCPL, BarChartCPL $barChartCPL)
    {
        $matakuliah_info = Mata_kuliah::where("kode_MK", $kode_MK)
        ->where("semester", $semester)
        ->where("tahun_akademik", $tahun_akademik)
        ->first();

        $this->authorize('view', $matakuliah_info);

        $defaultCpl = json_decode($matakuliah_info->cpl, true);

        $selectedCpmk = $request->input('selectedCpmk', 1);
        $selectedCpl = $request->input('selectedCpl', reset($defaultCpl));

        $pieChartCPMK = new PieChartCPMK(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedCpmk);
        $pieChartCPL = new PieChartCPL(app(\ArielMejiaDev\LarapexCharts\LarapexChart::class), $selectedCpl);

        $matkul_id = $kode_MK;
        $semester_matkul = $semester;
        $tahun_akademik_matkul = $tahun_akademik;
        $cplColumns = json_decode($matakuliah_info->cpl, true);

        return view('content.excel.nilai_mahasiswa', [
            'matakuliah_info' => $matakuliah_info,
            'cplColumns' => $cplColumns,
            'matkul_id' => $matkul_id,
            'semester_matkul' => $semester_matkul,
            'tahun_akademik_matkul' => $tahun_akademik_matkul,
            'selectedCpl' => $selectedCpl,
            'selectedCpmk' => $selectedCpmk,
            'pieChartCPMK' => $pieChartCPMK->build($selectedCpmk,  $tahun_akademik, $semester, $kode_MK),
            'pieChartCPL' => $pieChartCPL->build($selectedCpl, $tahun_akademik, $semester, $kode_MK),
            'barChartCPL' => $barChartCPL->build($tahun_akademik, $semester, $kode_MK)
        ]);
    }


    public function datatables(Request $request, $tahun_akademik, $semester, $kode_MK)
    {
        if ($request->ajax()) {
            $matakuliah_info = Mata_kuliah::where("tahun_akademik", $tahun_akademik)
                ->where("semester", $semester)
                ->where("kode_MK", $kode_MK)
                ->first();

            if (!$matakuliah_info) {
                return response()->json(['error' => 'Matakuliah not found.'], 404);
            }

            $cpmkCount = count(explode('. ', $matakuliah_info->cpmk));

            $data = NilaiMahasiswa::where('tahun_akademik_matkul', $tahun_akademik)
                ->where('semester_matkul', $semester)
                ->where('id_matkul', $kode_MK)
                ->get();

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('cpmkCount', function ($row) use ($cpmkCount) {
                    return $cpmkCount;
                })
                ->make(true);
        }
    }

    public function inputexcel(Request $request, $tahun_akademik_matkul, $semester_matkul, $matkul_id){

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMatkul', $namaFile);

        Excel::import(new ExcelImportNilaiMahasiswa, public_path('/DataMatkul/'.$namaFile));
        Alert::success('Berhasil', 'Nilai Mahasiswa berhasil di Import');
        return redirect()->route('mata_kuliah', [
            'tahun_akademik_matkul' => $tahun_akademik_matkul,
            'semester_matkul' => $semester_matkul,
            'matkul_id' => $matkul_id
        ]);
    }

    public function evaluasi_matkul (Request $request ,$tahun_akademik ,$semester ,$kode_MK){
        if ($request->ajax()) {
            $matakuliah_info = Mata_kuliah::where("kode_MK", $kode_MK)
            ->where("semester", $semester)
            ->where("tahun_akademik", $tahun_akademik)
            ->first();
            
            if (!$matakuliah_info) {
                return response()->json(['error' => 'Evaluasi not found.'], 404);
            }

            $eval_data = Evaluasi_cpmk::where('tahun_akademik_eval', $tahun_akademik)
            ->where('semester_eval', $semester)
            ->where('id_eval_matkul', $kode_MK)
            ->get();
    
            return datatables()->of($eval_data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('components.evaluasi-action', [
                    'id_eval_matkul' => $row->id_eval_matkul,
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }
}
