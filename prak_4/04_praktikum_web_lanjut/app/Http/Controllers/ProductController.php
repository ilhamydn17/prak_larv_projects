<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function index()
    {
        return view('product', [
            'datas' => Category::all(),
        ]);
    }

    public function getBy($slugCategory)
    {
        return view('products', [
            'datas' => Product::whereHas('category', function ($query) use (
                $slugCategory
            ) {
                $query->where('slug', $slugCategory);
            })->get(),
        ]);
    }
}
