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
            return datatables()->of(Mata_kuliah::onlyTrashed())
            ->addColumn('dosen_name', function ($row) {
                // Access the Dosen name through the eager-loaded relationship
                return $row->dosen->Nama_Dosen;
            })
            ->addColumn('action', function ($row) use ($user) {
                return view('components.admin-action', [
                    'id' => $row->id,
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

    public function cpl_datatables(User $user)
    {
        $user = auth()->user();
        $this->authorize('isAdmin', $user);// Check if the user is an admin
        
        if(request()->ajax()) {
            return datatables()->of(Cpl::onlyTrashed())
            ->addColumn('action', function ($row) use ($user) {
                return view('components.admin_cpl-action', [
                    'id' => $row->id,
                    'isAdmin' => $user->isAdmin(),
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function dosen_datatables(User $user)
    {
        $user = auth()->user();
        $this->authorize('isAdmin', $user);// Check if the user is an admin
        
        if(request()->ajax()) {
            return datatables()->of(Dosen::onlyTrashed())
            ->addColumn('action', function ($row) use ($user) {
                return view('components.admin_dosen-action', [
                    'id_dosen' => $row->id_dosen,
                    'isAdmin' => $user->isAdmin(),
                ]);
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    }

    public function matkul_delete(Request $request)
    {
        $matakuliah = Mata_kuliah::findOrFail($request->id);
        $matakuliah->delete();

        return response()->json(['message' => 'Matakuliah deleted successfully']);
    }

    public function matkul_restore(Request $request)
    {
        $matakuliah = Mata_kuliah::withTrashed()->findOrFail($request->id);
        $matakuliah->restore();
        
        return $matakuliah;
    }

    public function cpl_delete(Request $request)
    {
        $matakuliah = Cpl::findOrFail($request->id);
        $matakuliah->delete();

        return response()->json(['message' => 'CPL deleted successfully']);
    }

    public function cpl_restore(Request $request)
    {
        $matakuliah = Cpl::withTrashed()->findOrFail($request->id);
        $matakuliah->restore();
        
        return $matakuliah;
    }

    public function dosen_delete(Request $request)
    {
        $matakuliah = Dosen::findOrFail($request->id_dosen);
        $matakuliah->delete();

        return response()->json(['message' => 'Dosen deleted successfully']);
    }

    public function dosen_restore(Request $request)
    {
        $matakuliah = Dosen::withTrashed()->findOrFail($request->id_dosen);
        $matakuliah->restore();
        
        return $matakuliah;
    }
}
