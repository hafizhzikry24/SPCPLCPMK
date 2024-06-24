<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi_cpmk;
use App\Models\Mata_kuliah;
use App\Models\NilaiMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class EvaluasiController extends Controller
{
    public function evaluasi(Request $request, $tahun_akademik_matkul, $semester_matkul, $matkul_id)
    {        
        Log::info('Parameters received', [
            'matkul_id' => $matkul_id,
            'semester_matkul' => $semester_matkul,
            'tahun_akademik_matkul' => $tahun_akademik_matkul,
        ]);

        $matakuliah_info = Mata_kuliah::where("kode_MK", $matkul_id)
            ->where("semester", $semester_matkul)
            ->where("tahun_akademik", $tahun_akademik_matkul)
            ->first();

        if (!$matakuliah_info) {
            Log::error('Mata Kuliah not found', [
                'kode_MK' => $matkul_id,
                'semester' => $semester_matkul,
                'tahun_akademik' => $tahun_akademik_matkul,
            ]);
            return response()->json(['error' => 'Mata Kuliah not found.'], 404);
        }

        return view('content.evaluasi', [
            'matakuliah_info' => $matakuliah_info,
            'matkul_id' => $matkul_id,
            'semester_matkul' => $semester_matkul,
            'tahun_akademik_matkul' => $tahun_akademik_matkul,
        ]);

        $batas_rerata_data = NilaiMahasiswa::where("id_matkul", $matkul_id)
        ->where("semester_matkul", $semester_matkul)
        ->where("tahun_akademik_matkul", $tahun_akademik_matkul)
        ->first();

        $totalSum = 0;
        $totalCount = 0;

        foreach ($batas_rerata_data as $item) {
            $rowSum = 0;
            $rowCount = 0;
        
            for ($i = 1; $i <= 12; $i++) {
                $column = 'cpl' . $i;
                if (!is_null($item->$column)) {
                    $rowSum += $item->$column;
                    $rowCount++;
                }
            }
        
            if ($rowCount > 0) {
                $totalSum += ($rowSum / $rowCount);
                $totalCount++;
            }
        }
        
        $averageCplValues = ($totalCount > 0) ? ($totalSum / $totalCount) : 0;
        return response()->json([
            'averageCplValues' => $averageCplValues
        ]);

    }

    public function evaluasi_datatables (Request $request ,$tahun_akademik ,$semester ,$kode_MK)
    {
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
                    'id_evaluasi' => $row->id_evaluasi,
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }

    
    public function store(Request $request)
    {
        // Debugging statement
        Log::info('ID Evaluasi: ' . $request->id_evaluasi);
    
        $id_evaluasi = $request->id_evaluasi;
    
        $evaluasi = Evaluasi_cpmk::updateOrCreate(
            [
                'id_evaluasi' => $id_evaluasi
            ],
            [
                'id_eval_matkul' => $request->id_eval_matkul,
                'tahun_akademik_eval' => $request->tahun_akademik_eval,
                'semester_eval' => $request->semester_eval,
                'cpmk' => $request->cpmk,
                'rerata' => $request->rerata,
                'ambang' => $request->ambang,
                'analisis_pelaksanaan' => $request->analisis_pelaksanaan,
                'rencana_perbaikan' => $request->rencana_perbaikan,
                'batas_ambang' => $request->batas_ambang,
                'batas_rerata' => $request->batas_rerata,
            ]
        );
    
        return response()->json($evaluasi);
    }
    

    public function edit (Request $request){
        $where = array('id_evaluasi' => $request->id_evaluasi);
        $evaluasi  = Evaluasi_cpmk::where($where)->first();

        return Response()->json($evaluasi);
    }

    public function destroy (Request $request){
        $evaluasi = Evaluasi_cpmk::findOrFail($request->id_evaluasi);
        $evaluasi->delete();
        return Response()->json($evaluasi);
    }
}