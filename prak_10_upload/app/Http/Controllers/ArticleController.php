<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return create article page
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewArticleRequest $request)
    {
        $image_name = "";
        if($request->file('image')){
            $image_name = $request->file('image')->store('public');
        }

        Article::create($request->validated() + ['featured_image' => $image_name]);

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        return view('article.detail', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        //create edit page
        $article = Article::find($id);
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        // default image name
        $image_name = Article::find($id)->featured_image;
        // if new image is uploaded
        if($request->file('new_image')){
            $image_name = $request->file('new_image')->store('public');
        }
        //create logic for update article
       Article::find($id)->update($request->validated() + ['featured_image' => $image_name]);

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
