<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Category;

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
    return view('home-2');
});

Route::get('/test', function () {
    return view('testing', [
        'datas' => Category::all(),
    ]);
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);

    Route::get('/education', function (Category $slug) {
        return view('products', [
            'product' => $slug,
        ]);
    });

    Route::get('/friends', [ProductController::class, 'getBy']);

    Route::get('/stories', [ProductController::class, 'getBy']);

    Route::get('/song', [ProductController::class, 'getBy']);
});

Route::prefix('program')->group(function () {
    Route::get('/', function () {
        return view('program');
    });

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
    Route::get('/', function () {
        return view('news');
    });

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
    return view('home-2');
});
