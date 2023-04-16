<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view to show all articles
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view to create new article
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $image_name = '';
        if($request->file('image')) $image_name = $request->file('image')->store('images', 'public');
        Article::create($request->validated() + ['featured_image' => $image_name]);
        return redirect()->route('art.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $article = Article::findorfail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findorfail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        $image_name = Article::findorfail($id)->featured_image;
        if($request->file('new_image')) $image_name = $request->file('new_image')->store('images', 'public');
        Article::findorfail($id)->update($request->validated() + ['featured_image' => $image_name]);

        return redirect()->route('art.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        Article::findorfail($id)->delete();
        return redirect()->route('art.index');
    }
}
