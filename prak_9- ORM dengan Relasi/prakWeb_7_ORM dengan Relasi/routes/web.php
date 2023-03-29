<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

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

Route::get('/test', function () {
    $mhs = Mahasiswa::with('matakuliah')->get();
    return view('test',['mhs' => $mhs]);
});

Route::get('/test2', function () {
    return view('mahasiswas.detail_matkul');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('mahasiswa/{nim}/khs',[MahasiswaController::class,'showMatkul'])->name('mahasiswa.nilai');
