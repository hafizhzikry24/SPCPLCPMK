<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $isAdmin = $user->isAdmin();

        if(request()->ajax()) {
            return datatables()->of(Dosen::select('*'))
            ->addColumn('action', function ($row) {
                return view('components.dosen-action', [
                    'id_dosen' => $row->id_dosen,
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.dosen', compact('user', 'isAdmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dosenId = $request->id_dosen;

        $dosen   =   Dosen::updateOrCreate(
                    [
                        'id_dosen' => $dosenId
                    ],
                    [
                        'NIP' => $request->NIP,
                        'Nama_Dosen' => $request->Nama_Dosen,
                    ]);
        return Response()->json($dosen);
    }

    public function edit(Request $request)
    {
        $where = array('id_dosen' => $request->id_dosen);
        $dosen  = Dosen::where($where)->first();

        return Response()->json($dosen);
    }

    public function destroy(Request $request)
    {
        $dosen = Dosen::findOrFail($request->id_dosen);
        $dosen->delete();
        return Response()->json($dosen);
    }
}
