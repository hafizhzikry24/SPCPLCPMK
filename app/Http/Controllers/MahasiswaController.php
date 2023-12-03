<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Datatables;

class MahasiswaController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Mahasiswa::select('*'))
            ->addColumn('action', 'components.mahasiswa-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.mahasiswa');
    }

    public function store(Request $request)
    {

        $mahasiswaId = $request->id;

        $mahasiswa   =   Mahasiswa::updateOrCreate(
                    [
                        'id' => $mahasiswaId
                    ],
                    [
                    'nim' => $request->nim,
                    'nama' => $request->nama,
                    'semester' => $request->semester
                    ]);

        return Response()->json($mahasiswa);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $mahasiswa  = Mahasiswa::where($where)->first();

        return Response()->json($mahasiswa);
    }

    public function destroy(Request $request)
    {
        $mahasiswa = Mahasiswa::where('id',$request->id)->delete();

        return Response()->json($mahasiswa);
    }
}
