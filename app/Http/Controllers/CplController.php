<?php

namespace App\Http\Controllers;

use App\Models\Cpl;
use App\Models\User;
use Illuminate\Http\Request;

class CplController extends Controller
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
            return datatables()->of(Cpl::select('*'))
            ->addColumn('action', function ($row) {
                return view('components.cpl-action', [
                    'id' => $row->id,
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('content.cpl', compact('user', 'isAdmin'));
    }
    public function store(Request $request)
    {
        $cplId = $request->id;

        $cpl   =   Cpl::updateOrCreate(
                    [
                        'id' => $cplId
                    ],
                    [
                        'nama' => $request->nama,
                        'desc' => $request->desc,
                    ]);
        return Response()->json($cpl);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $cpl  = Cpl::where($where)->first();

        return Response()->json($cpl);
    }

    public function destroy(Request $request)
    {
        $cpl = Cpl::findOrFail($request->id);
        $cpl->delete();
        return Response()->json($cpl);
    }
}
