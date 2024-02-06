<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mata_kuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Mata_kuliah::select('*'))
            ->addColumn('action', function ($row) {
                return view('components.matakuliah-action', ['id' => $row->id, 'kode_MK' => $row->kode_MK]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        $dosens = Dosen::all();

        return view('content.matakuliah', compact('dosens'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $matakuliahId = $request->id;

        $matakuliah   =   Mata_kuliah::updateOrCreate(
                    [
                        'id' => $matakuliahId
                    ],
                    [
                        'kode_MK' => $request->kode_MK,
                        'Mata_Kuliah' => $request->Mata_Kuliah,
                        'semester' => $request->semester,
                        'SKS' => $request->SKS,
                        'Nama_Dosen' => $request->Nama_Dosen,
                        'cpmk' => $request->cpmk,
                    ]);
        return Response()->json($matakuliah);
    }


    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $matakuliah  = Mata_kuliah::where($where)->first();

        return Response()->json($matakuliah);
    }

    public function destroy(Request $request)
    {
        $matakuliah = Mata_kuliah::where('id',$request->id)->delete();

        return Response()->json($matakuliah);
    }
}

