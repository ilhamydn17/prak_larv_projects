@extends('layouts.app')

@section('title', 'Update Article')

@section('content')
    <p>{{ $article->featured_image }}</p>
    <form action="{{ route('article.update',$article->id) }}}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" name="title" value="{{ $article->title }}"></br>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" class="form-control" name="content"
                value="{{ $article->content }}"></br>
        </div>
        <div class="form-group">
            <label for="image">Feature Image</label>
            <input type="file" class="form-control" name="new_image"
                value="{{ $article->featured_image }}"></br>
            <img width="150px" src="{{
                Storage::url($article->featured_image)
            }}">
        </div>
        <button type="submit" class="btn btn-primary float-right">Ubah Data</button>
    </form>
@endsection
