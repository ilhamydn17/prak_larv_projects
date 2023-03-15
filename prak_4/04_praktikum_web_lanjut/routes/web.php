<?php

use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;

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

Route::prefix('products')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);

    Route::get('/Marbel Education/{slugCategory}', [
        ProductController::class,
        'getBy',
    ]);

    Route::get('/Marbel And Friends/{slugCategory}', [
        ProductController::class,
        'getBy',
    ]);

    Route::get('/Riri Story/{slugCategory}', [
        ProductController::class,
        'getBy',
    ]);

    Route::get('/Kolak Song/{slugCategory}', [
        ProductController::class,
        'getBy',
    ]);
});

Route::prefix('program')->group(function () {
    Route::get('/', [ProgramController::class, 'index']);

    Route::get('/program-karir', function () {
        return view('single-program', [
            'info' => 'Program Karir',
        ]);
    });
    Route::get('/program-magang', function () {
        return view('single-program', [
            'info' => 'Program magang',
        ]);
    });
    Route::get('/program-kunjungan-industri', function () {
        return view('single-program', [
            'info' => 'Program Kunjungan industri',
        ]);
    });
});

Route::prefix('news')->group(function () {
    Route::get('/', function () {
        return view('news', [
            'news' => News::all(),
        ]);
    });

    Route::get('/{id}', function ($id) {
        return view('news-single', [
            'id' => $id,
            'news' => News::find($id),
        ]);
    });
});

// Route::get('/news/{id}', function ($id) {});

Route::get('/about-us', function () {
    return view('about-us', [
        'info' => 'About Us',
    ]);
});

Route::resource('contact-us', ContactController::class);

// testing praktikum 2
// Route::get('/test2', function () {
//     return view('home-2');
// });

// Route::get('products/{slug}', [ProductController::class, 'getBy']);

// Route::resource('kategori', CategoryController::class);
// // Route::resource('produk', ProductController::class);

// Auth::routes();

// Route::get('/home', [
//     App\Http\Controllers\HomeController::class,
//     'index',
// ])->name('home');
