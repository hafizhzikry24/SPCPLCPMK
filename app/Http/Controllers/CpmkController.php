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
}
