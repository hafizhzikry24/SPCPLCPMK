<?php

namespace App\Http\Controllers;

use App\Models\Cpmk;
use App\Models\Evaluasi_cpmk;
use App\Models\Mata_kuliah;
use Illuminate\Http\Request;

class CpmkController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if(request()->ajax()) {
            return datatables()->of(Mata_kuliah::select('*'))
            ->addColumn('action', function ($row) {
                return view('components.cpmk-action', [
                    'id' => $row->id,
                    'tahun_akademik' => $row->tahun_akademik,
                    'semester' => $row->semester,
                    'kode_MK' => $row->kode_MK,
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.cpmk', compact('user'));
    }

    public function evaluasi(Request $request, $semester, $kode_MK, $tahun_akademik)
    {        

        $matakuliah_info = Mata_kuliah::where("kode_MK", $kode_MK)
        ->where("semester", $semester)
        ->where("tahun_akademik", $tahun_akademik)
        ->first();

        $this->authorize('view', $matakuliah_info);
        
        $matkul_id = $kode_MK;
        $semester_matkul = $semester;
        $tahun_akademik_matkul = $tahun_akademik;

        return view('content.evaluasi', [
            'matakuliah_info' => $matakuliah_info,
            'matkul_id' => $matkul_id,
            'semester_matkul' => $semester_matkul,
            'tahun_akademik_matkul' => $tahun_akademik_matkul,
        ]);
    }

    public function evaluasi_datatables (Request $request ,$tahun_akademik ,$semester ,$kode_MK){
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
