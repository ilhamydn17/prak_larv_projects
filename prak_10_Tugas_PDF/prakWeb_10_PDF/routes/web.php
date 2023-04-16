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
Route::resource('mahasiswa', MahasiswaController::class);
Route::name('mahasiswa.nilai')->get('mahasiswa/{nim}/khs', [MahasiswaController::class, 'showMatkul']);
Route::name('mahasiswa.search')->post('mahasiswa/src',[MahasiswaController::class, 'search']);
