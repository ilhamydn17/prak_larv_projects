@extends('layouts.app')

@section('title', 'Crete Article')

@section('content')
    <form action="{{ route('article.index') }}" method="post" enctype="multipart/formdata">

        @csrf
        <div class="form-group">
            <label for="title">Title: </label>
            <input type="text" class="form-control" required="required" name="title"></br>
            <label for="content">Content: </label>
            <textarea type="text" class="form-control" required="required" name="content"></textarea></br>
            <label for="image">Feature Image: </label>
            <input type="file" class="form-control" required="required" name="image"></br>
            <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
    </form>

@endsection