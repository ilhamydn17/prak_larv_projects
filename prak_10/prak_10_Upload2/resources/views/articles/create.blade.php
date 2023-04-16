@extends('articles.template.app')

@section('title', 'Create Article')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-8 mx-auto my-4 p-3 border border-2 rounded shadow">
                <section>
                    <h3 class="text-center">Create Article</h3>
                </section>
                <hr>
                <form action="{{ route('art.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" required="required" name="title"></br>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <textarea type='text' class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Feature Image</label>
                        <input type="file" class="form-control" required="required" name="image"></br>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary float-right">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
