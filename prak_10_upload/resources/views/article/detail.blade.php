@extends('layouts.app')

@section('title', 'Detail Article')

@section('content')
    <div class="container">

        {{-- @dd($article) --}}
        <div class="card mx-auto my-3" style="width: 600px">
            <img src="{{
                Storage::url($article->featured_image)
            }}" class="card-img-top" alt="..." width="80px">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $article->title }}</h6>
                <p class="card-text">{{ $article->content }}</p>
                <a href="{{ route('article.index') }}" class="btn btn-info btn-sm">kembali</a>
                <a href="{{ route('article.edit',$article->id) }}" class="btn btn-warning btn-sm">edit article</a>
            </div>
        </div>
    </div>
@endsection
