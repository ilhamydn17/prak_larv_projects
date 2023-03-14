@extends('layouts.template')

@section('heading','Our Products')

@section('content')

    <div class="row">
        @foreach ($datas as $data)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow p-3">
                {{-- <img src="https://source.unsplash.com/200x100?kids" class="card-img-top" alt="..."> --}}
                <h5 class="card-title mt-1"> {{ $data->name  }}  </h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="/products/{{ $data->slug  }}" class="btn btn-primary btn-sm">get more</a>
            </div>
         </div>
        @endforeach
    </div>

@endsection
