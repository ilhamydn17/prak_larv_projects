<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;

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
// simple route

Route::get('/', function () {
    return view('home-2');
});

Route::get('/test', function () {
    return view('test');
});

Route::prefix('products')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);

    Route::get('/education/{slugCategory}', [
        ProductController::class,
        'getBy',
    ]);

    Route::get('/friends/{slugCategory}', [ProductController::class, 'getBy']);

    Route::get('/stories/{slugCategory}', [ProductController::class, 'getBy']);

    Route::get('/song/{slugCategory}', [ProductController::class, 'getBy']);
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

Route::get('products/{slug}', [ProductController::class, 'getBy']);

Route::resource('kategori', CategoryController::class);
// Route::resource('produk', ProductController::class);
