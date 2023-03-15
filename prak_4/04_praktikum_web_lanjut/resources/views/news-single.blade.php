@extends('layouts.template')

@section('title','News')

@section('heading','Title News : '.$news->title)

@section('content')
<div class="container-sm border border-2 rounded-3">
    <h1>{{ $news->title }}</h1>
    <p>{{ $news->desc }}</p>
</div>
@endsection
