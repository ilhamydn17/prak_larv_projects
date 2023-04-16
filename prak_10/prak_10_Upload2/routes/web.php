<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
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

Route::get('/', function () {
    $articles = Article::all();
    return view('articles.index', compact('articles'));
});

Route::resource('article', ArticleController::class)->names([
    'index' => 'art.index',
    'create' => 'art.create',
    'store' => 'art.store',
    'show' => 'art.show',
    'edit' => 'art.edit',
    'update' => 'art.update',
    'destroy' => 'art.destroy',
]);

