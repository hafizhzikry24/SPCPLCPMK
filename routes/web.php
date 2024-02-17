<?php

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
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    // Route::view('/cpl', 'content.cpl')->name('cpl');
    // Route::view('/cpmk', 'content.cpmk')->name('cpmk');
    Route::view('/matakuliah', 'content.matakuliah')->name('matakuliah');

    // Route::view('/mahasiswa', 'content.mahasiswa')->name('mahasiswa');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::post('/mahasiswa/edit', [MahasiswaController::class, 'edit']);
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
    Route::post('/mahasiswa/delete', [MahasiswaController::class, 'destroy']);

    Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah');
    Route::post('/matakuliah/edit', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');;
    Route::post('/matakuliah/store', [MatakuliahController::class, 'store'])->name('matakuliah.store');
    Route::post('/matakuliah/delete', [MatakuliahController::class, 'destroy'])->name('matakuliah.delete');;

    Route::get('/cpl', [CplController::class, 'index'])->name('cpl');
    Route::get('/cpmk', [CpmkController::class, 'index'])->name('cpmk');
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
    Route::get('/rekap', [ChartAllController::class, 'index'])->name('rekap');

    Route::get('/mata_kuliah/{matkul_id}', [NilaiMahasiswaController::class, 'view'])->name('mata_kuliah');
    Route::post('/mata_kuliah/excel/{matkul_id}', [NilaiMahasiswaController::class, 'inputexcel'])->name('mata_kuliah.inputexcel');
    Route::get('/datatables/{matkul_id}', [NilaiMahasiswaController::class, 'datatables'])->name('mata_kuliah.datatables');
    Route::match(['get', 'post'], '/mata_kuliah/{matkul_id}/{selectedCpmk?}', [NilaiMahasiswaController::class, 'view'])->name('chartcpmk');
    Route::post('/mata_kuliah/chart', [NilaiMahasiswaController::class, 'getChartContent'])->name('chart');

    Route::get('/matakuliah/PTSK6506', [ExcelsdlController::class, 'index'])->name('PTSK6506');
    Route::post('/importexcelsdl', [ExcelsdlController::class, 'excelsdlimport'])->name('importexcelsdl');
    Route::match(['get', 'post'], '/matakuliah/PTSK6506/{selectedCpmk?}', [ExcelsdlController::class, 'index'])->name('cpmkPTSK6506');

    Route::get('/matakuliah/PTSK6103', [ExcelDKPController::class, 'index'])->name('PTSK6103');
    Route::post('/importexceldkp', [ExcelDKPController::class, 'exceldkpimport'])->name('importexceldkp');





    // Route without selectedCpmk
    Route::get('/matakuliah/PTSK6660', [PTSK6660Controller::class, 'index'])->name('PTSK6660');
    // Route with selectedCpmk
    Route::match(['get', 'post'], '/matakuliah/PTSK6660/{selectedCpmk?}', [PTSK6660Controller::class, 'index'])->name('cpmkPTSK6660');
    Route::post('/ExcelPTSK6660', [PTSK6660Controller::class, 'ExcelPTSK6660'])->name('ExcelPTSK6660');

    // Route::get('/matakuliah/PTSK6660', [PTSK6660Controller::class, 'index'])->name('PTSK6660');
    // Route::post('/matakuliah/PTSK6660/{selectedCpmk}', [PTSK6660Controller::class, 'index'])->name('cpmkPTSK6660');


    // Route::view('/dosen', 'content.dosen')->name('dosen');
    Route::view('/nilai', 'content.nilai')->name('nilai');
    // Route::view('/excel', 'content.excel.excel')->name('excel');
    Route::view('/nilai', 'content.nilai')->name('nilai');
    // Route::view('/rekap', 'content.rekap')->name('rekap');
    Route::view('/rapor', 'content.rapor')->name('rapor');
    Route::view('/bukupanduan', 'content.bukupanduan')->name('bukupanduan');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#multiuser
Route::get('/', [HomeController::class, 'index'])->name('welcome')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');




require __DIR__ . '/auth.php';
