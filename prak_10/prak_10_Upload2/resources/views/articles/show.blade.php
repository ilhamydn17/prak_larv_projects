@extends('articles.template.app')

@section('title', 'Detail Article')

@section('content')
    {{-- view detail of article --}}
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-8 mx-auto p-3">
                <figure class="figure border border-2 shadow rounded-2 p-3">
                    <img src="{{ Storage::url($article->featured_image) }}" class="figure-img img-fluid rounded" alt="Picture.">
                    <figcaption class="figure-caption">
                        <h3>{{ $article->title }}</h3>
                        <p style="font-size: 13px">-created {{ $article->created_at->diffForHumans() }}- | -updated {{ $article->updated_at->diffForHumans() }}-</p>
                        <p>{{ $article->content }}</p>
                    </figcaption>
                    <section>
                        <a href="{{ route('art.index') }}" class="btn btn-sm btn-success">back</a>
                        <a href="{{ route('art.edit', $article->id) }}" class="btn btn-sm btn-info">edit</a>
                        <a href="" onclick="
                          if(confirm('Are you sure want to delete?') ){
                             event.preventDefault();
                            document.getElementById('delete-form').submit();
                          }
                        " class="btn btn-sm btn-danger">delete</a>

                        {{-- form to delete article --}}
                        <form id="delete-form" action="{{ route('art.destroy',$article->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </section>
                  </figure>
            </div>
        </div>
    @endsection
