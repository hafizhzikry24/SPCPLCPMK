<?php

namespace App\Http\Controllers;

use App\Models\Cpl;
use App\Models\Dosen;
use App\Models\Mata_kuliah;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        try {
            $matakuliah = Mata_kuliah::onlyTrashed()->findOrFail($request->id);
            $matakuliah->forceDelete();
    
            return response()->json(['success' => true, 'message' => 'Mata Kuliah Berhasil Dihapus Permanen']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Matakuliah not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete matakuliah'], 500);
        }
    }

    public function matkul_restore(Request $request)
    {
        $matakuliah = Mata_kuliah::withTrashed()->findOrFail($request->id);
        $matakuliah->restore();
        
        return $matakuliah;
    }

    public function cpl_delete(Request $request)
    {
        try {
            $cpl = Cpl::onlyTrashed()->findOrFail($request->id);
            $cpl->forceDelete();
    
            return response()->json(['success' => true, 'message' => 'CPL Berhasil Dihapus Permanen']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'CPL not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete CPL'], 500);
        }
    }

    public function cpl_restore(Request $request)
    {
        $matakuliah = Cpl::withTrashed()->findOrFail($request->id);
        $matakuliah->restore();
        
        return $matakuliah;
    }

    public function dosen_delete(Request $request)
    {
        try {
            $dosen = Dosen::onlyTrashed()->findOrFail($request->id_dosen);
            $dosen->forceDelete();
    
            return response()->json(['success' => true, 'message' => 'Dosen Berhasil Dihapus Permanen']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Dosen not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete Dosen'], 500);
        }
    }

    public function dosen_restore(Request $request)
    {
        $matakuliah = Dosen::withTrashed()->findOrFail($request->id_dosen);
        $matakuliah->restore();
        
        return $matakuliah;
    }
}
