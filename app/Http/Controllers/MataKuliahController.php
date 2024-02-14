<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mata_kuliah;
use App\Models\Cpl;
use App\Models\User;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
// MatakuliahController.php

public function index()
{
    $user = auth()->user();

    if (request()->ajax()) {
        // Check if the user is an admin
        if ($user->isAdmin()) {
            $subjectsQuery = Mata_kuliah::select('*');
        } else {
            // If not an admin, retrieve only the Matakuliah that has the same NIP as the user
            $subjectsQuery = Mata_kuliah::where('NIP', $user->NIP)->select('*');
        }


        return datatables()->of($subjectsQuery)
            ->addColumn('action', function ($row) use ($user) {
                return view('components.matakuliah-action', [
                    'id' => $row->id,
                    'kode_MK' => $row->kode_MK,
                    'isAdmin' => $user->isAdmin(),
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }

    $dosens = Dosen::all();
    $cpl = Cpl::all();

    return view('content.matakuliah', compact('dosens', 'user', 'cpl'));
}


    public function store(Request $request)
    {
        // dd($request->all(),$request->cpl);
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
                        'NIP' => $request->NIP,
                        'cpl' => json_encode($request->cpl),
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
        $matakuliah = Mata_kuliah::findOrFail($request->id);
        $matakuliah->delete();

        return Response()->json($matakuliah);
    }
}

