@extends('layouts.app')

@section('title', 'Index Pages')

@section('content')
    {{-- create index page for articles --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Index Page</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <a href="{{ route('article.create') }}" class="btn btn-info">Add Article</a>
            </div>
        </div>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-3 my-2 ms-1">
                    <div class="card" style="width: 16rem;">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->content }}</p>
                            <a href="{{ route('article.show',$article->id) }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste, sit. --}}
@endsection
