<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

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
    return view('welcome');
});

Route::resource('mahasiswa', MahasiswaController::class)->names([
    'index' => 'mahasiswa.index',
    'create' => 'mahasiswa.create',
    'store' => 'mahasiswa.store',
    'show' => 'mahasiswa.show',
    'edit' => 'mahasiswa.edit',
    'update' => 'mahasiswa.update',
    'destroy' => 'mahasiswa.destroy',
]);

// Route::name('mahasiswa.test')->get('mahasiswa/test', [MahasiswaController::class, 'test']);
