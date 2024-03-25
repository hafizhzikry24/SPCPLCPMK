<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartAllController;
use App\Http\Controllers\CplController;
use App\Http\Controllers\CpmkController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ExcelDKPController;
use App\Http\Controllers\ExcelsdlController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\NilaiMahasiswaController;
use App\Http\Controllers\PTSK6660Controller;
use App\Http\Controllers\RaporController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::view('/matakuliah', 'content.matakuliah')->name('matakuliah');

    // Route::view('/mahasiswa', 'content.mahasiswa')->name('mahasiswa');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::post('/mahasiswa/edit', [MahasiswaController::class, 'edit']);
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
    Route::post('/mahasiswa/delete', [MahasiswaController::class, 'destroy']);

    Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah');
    Route::post('/matakuliah/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::post('/matakuliah/store', [MataKuliahController::class, 'store'])->name('matakuliah.store');
    Route::post('/matakuliah/delete', [MataKuliahController::class, 'destroy'])->name('matakuliah.delete');

    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
    Route::post('/dosen/edit', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::post('/dosen/store', [DosenController::class, 'store'])->name('dosen.store');
    Route::post('/dosen/delete', [DosenController::class, 'destroy'])->name('dosen.delete');

    
    Route::get('/cpl', [CplController::class, 'index'])->name('cpl');
    Route::get('/cpmk', [CpmkController::class, 'index'])->name('cpmk');
    Route::get('/rekap', [ChartAllController::class, 'index'])->name('rekap');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    Route::get('/mata_kuliah/{tahun_akademik_matkul}/{semester_matkul}/{matkul_id}', [NilaiMahasiswaController::class, 'view'])->name('mata_kuliah');
    Route::post('/mata_kuliah/excel/{tahun_akademik_matkul}/{semester_matkul}/{matkul_id}', [NilaiMahasiswaController::class, 'inputexcel'])->name('mata_kuliah.inputexcel');
    Route::get('/datatables/{tahun_akademik_matkul}/{semester_matkul}/{matkul_id}', [NilaiMahasiswaController::class, 'datatables'])->name('mata_kuliah.datatables');
    Route::match(['get', 'post'], '/mata_kuliah/{tahun_akademik_matkul}/{semester_matkul}/{matkul_id}/cpmk_pie/{selectedCpmk?}', [NilaiMahasiswaController::class, 'view'])->name('pieChartCpmk');
    Route::match(['get', 'post'], '/mata_kuliah/{tahun_akademik_matkul}/{semester_matkul}/{matkul_id}/cpl_pie/{selectedCpl?}', [NilaiMahasiswaController::class, 'view'])->name('pieChartCpl');
    Route::match(['get', 'post'], '/rekap/{selectedTahunAkademik?}/{selectedSemester?}', [ChartAllController::class, 'index'])->name('semesterChart');

    Route::get('/admin', [AdminController::class, 'view'])->name('admin');
    Route::get('/admin/datatables/cpl', [AdminController::class, 'cpl_datatables'])->name('admin.cpl_datatables');
    Route::get('/admin/datatables/dosen', [AdminController::class, 'dosen_datatables'])->name('admin.dosen_datatables');
    Route::post('/admin/delete/matakuliah', [AdminController::class, 'matkul_delete'])->name('matkul_admin.delete');
    Route::post('/admin/restore/matakuliah', [AdminController::class, 'matkul_restore'])->name('matkul_admin.restore');
    Route::post('/admin/delete/cpl', [AdminController::class, 'cpl_delete'])->name('cpl_admin.delete');
    Route::post('/admin/restore/cpl', [AdminController::class, 'cpl_restore'])->name('cpl_admin.restore');
    Route::post('/admin/delete/dosen', [AdminController::class, 'dosen_delete'])->name('dosen_admin.delete');
    Route::post('/admin/restore/dosen', [AdminController::class, 'dosen_restore'])->name('dosen_admin.restore');

    Route::view('/nilai', 'content.nilai')->name('nilai');
    Route::view('/nilai', 'content.nilai')->name('nilai');
    Route::view('/rapor', 'content.rapor')->name('rapor');
    Route::view('/bukupanduan', 'content.bukupanduan')->name('bukupanduan');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#multiuser
Route::get('/', [HomeController::class, 'dashboard'])->name('welcome')->middleware('auth');
Route::get('/home', [HomeController::class, 'dashboard'])->name('home')->middleware('auth');




require __DIR__ . '/auth.php';
