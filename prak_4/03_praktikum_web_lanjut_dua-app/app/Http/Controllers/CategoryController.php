<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as produk;
use App\Models\Category as category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('product', [
            'datas' => category::all(),
        ]);

        /* DIBAWAH INI ADALAH CARA MENAMPILKAN DATA YANG BERELASI DENGAN CATEGORY */
        // cara 1
        // $produk = Produk::with('category')
        //     ->where('title', 'like', '%eum%')
        //     ->get();

        // cara 2
        // $produk = Produk::whereCategoryId(4)->get();

        //cara 3
        // $produk = Produk::join(
        //     'categories',
        //     'products.category_id',
        //     '=',
        //     'categories.id'
        // )
        //     // ->select('products.*', 'categories.name')
        //     ->get();
        // return view('test', compact('produk'));
    }
}
