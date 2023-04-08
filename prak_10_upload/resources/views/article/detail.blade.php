@extends('layouts.app')

@section('title', 'Detail Article')

@section('content')
    <div class="container">
        <div class="card mx-auto my-3" style="width: 600px">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $article->title }}</h6>
                <p class="card-text">{{ $article->content }}</p>
                <a href="{{ route('article.index') }}" class="btn btn-info btn-sm">kembali</a>
            </div>
        </div>
    </div>
@endsection
