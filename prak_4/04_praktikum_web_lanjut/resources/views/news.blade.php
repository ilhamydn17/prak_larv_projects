@extends('layouts.template')

@section('title','News')

@section('heading','News')

@section('content')
    {{-- @dd($id) --}}
    <div class="row">
        @foreach ($news as $n)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow p-3">
                {{-- <img src="https://source.unsplash.com/200x100?kids" class="card-img-top" alt="..."> --}}
                <h5 class="card-title mt-1"> {{ $n->title}}  </h5>
                <p class="card-text">{{ $n->desc }}</p>
                <a href="/news/{{$n->id}}" class="btn btn-primary btn-sm">read more</a>
            </div>
         </div>
        @endforeach
    </div>
@endsection



