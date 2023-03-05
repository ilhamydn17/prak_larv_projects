<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

// -----------------------------------------------

Route::get('/', function () {
    return view('home_2');
});

Route::prefix('product')->group(function () {
    Route::get('/marbel-edu', function () {
        return view('product', [
            'info' => 'Product : marbel edu',
        ]);
    });
    Route::get('/marbel-friends', function () {
        return view('product', [
            'info' => 'Product : marbel friends',
        ]);
    });
    Route::get('/riri', function () {
        return view('product', [
            'info' => 'Product : Riri',
        ]);
    });
    Route::get('/kolak', function () {
        return view('product', [
            'info' => 'Product : kolak',
        ]);
    });
});

Route::prefix('program')->group(function () {
    Route::get('/karir', function () {
        return view('program', [
            'info' => 'Program karir',
        ]);
    });
    Route::get('/magang', function () {
        return view('program', [
            'info' => 'Program magang',
        ]);
    });
    Route::get('/kunjungan-industri', function () {
        return view('program', [
            'info' => 'Program Kunjungan industri',
        ]);
    });
});

Route::prefix('news')->group(function () {
    Route::get('/{id}', function ($id) {
        return view('news', [
            'idNews' => $id,
        ]);
    });
});

Route::get('/about-us', function () {
    return view('about-us', []);
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

// testing praktikum 2
Route::get('/test2', function () {
    return view('testing');
});
