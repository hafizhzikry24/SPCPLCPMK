<?php

namespace App\Http\Controllers;

use App\Models\Cpl;
use App\Models\Dosen;
use App\Models\Mata_kuliah;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view(User $user)
    {
        $user = auth()->user();
        $this->authorize('isAdmin', $user);// Check if the user is an admin

        if(request()->ajax()) {
            return datatables()->of(Mata_kuliah::select('*'))
            ->addColumn('dosen_name', function ($row) {
                // Access the Dosen name through the eager-loaded relationship
                return $row->dosen->Nama_Dosen;
            })
            ->addColumn('action', function ($row) use ($user) {
                return view('components.admin-action', [
                    'id' => $row->id,
                    'tahun_akademik' => $row->tahun_akademik,
                    'semester' => $row->semester,
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
        // If the user is an admin, continue to show the admin page
        return view('content.admin', compact('dosens', 'user', 'cpl'));
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
                        'tahun_akademik' => $request->tahun_akademik,
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
