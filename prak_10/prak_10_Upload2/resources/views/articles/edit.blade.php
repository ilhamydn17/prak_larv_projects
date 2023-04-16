@extends('articles.template.app')

@section('title', 'Edit Article')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-8 mx-auto my-4 p-3 border border-2 rounded shadow">
                <section>
                    <h3 class="text-center">Edit Article</h3>
                </section>
                <hr>
                <form action="{{ route('art.update',$article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" value="{{ $article->title }}" class="form-control"  name="title"></br>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <input type="text" value="{{ $article->content }}" class="form-control"  name="content"></br>
                    </div>
                    <div class="form-group">
                        <label for="image">Feature Image</label>
                        <input type="file" class="form-control"  name="new_image"></br>
                        <img src="{{ Storage::url($article->featured_image) }}" class="my-2" alt="" width="200px">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary float-right">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
