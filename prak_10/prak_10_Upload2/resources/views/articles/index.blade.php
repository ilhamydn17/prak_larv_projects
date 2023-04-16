@extends('articles.template.app')

@section('title', 'Articles')

@section('content')
    <div class="container  my-3">
        <div class="row">
            <div class="col">
                <h3 class="text-center">My Articles</h3>
                <a href="{{ route('art.create') }}" class="btn btn-primary">Create article</a>
            </div>
        </div>
       
        <div class="row mt-4">
            <div class="col">
                @foreach ($articles as $article)
                    <article>
                        <h3>{{ $article->title }}</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
                        <a href="{{ route('art.show', $article->id) }}" class="btn btn-info btn-sm">Read More</a>
                        <hr>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
