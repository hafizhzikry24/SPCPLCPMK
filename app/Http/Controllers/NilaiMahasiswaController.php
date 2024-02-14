<?php

namespace App\Http\Controllers;

use App\Models\Mata_kuliah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NilaiMahasiswaController extends Controller
{
    public function view($kode_MK)
    {
        // Assuming you retrieve $matakuliah_info from your database
        $matakuliah_info = Mata_kuliah::where("kode_MK", $kode_MK)->first();
    
        // Pass the $matakuliah_info to the view
        return view('content.excel.nilai_mahasiswa', compact('matakuliah_info'));
    }
    
    
}
