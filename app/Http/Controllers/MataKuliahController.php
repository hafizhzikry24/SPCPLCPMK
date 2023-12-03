<?php

namespace App\Http\Controllers;

use App\Models\Mata_kuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Mata_kuliah::select('*'))
            ->addColumn('action', 'components.matakuliah-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.matakuliah');
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
                        'Tahun_ajaran' => $request->Tahun_ajaran,
                        'SKS' => $request->SKS,
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

