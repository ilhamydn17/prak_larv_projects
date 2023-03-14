@extends('layouts.template')

@section('heading','Welcome User!')

@section('content')

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-primary shadow p-3">
           {{-- <img src="https://source.unsplash.com/200x100?kids" class="card-img-top" alt="..."> --}}
           <h5 class="card-title mt-1">Marbel Edu</h5>
           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
       </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-warning shadow p-3">
           {{-- <img src="https://source.unsplash.com/200x100?games" class="card-img-top" alt="..."> --}}
           <h5 class="card-title mt-1">Marbel and Friends</h5>
           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
       </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-success shadow p-3">
           {{-- <img src="https://source.unsplash.com/200x100?kids-story" class="card-img-top" alt="..."> --}}
           <h5 class="card-title mt-1">Riri Story</h5>
           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
       </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-danger shadow p-3">
           {{-- <img src="https://source.unsplash.com/200x100?kids-song" class="card-img-top" alt="..."> --}}
           <h5 class="card-title mt-1">Kolak Kids Song</h5>
           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
       </div>
    </div>


   <!-- Earnings (Monthly) Card Example -->
   {{-- <div class="col-xl-3 col-md-6 mb-4">
       <div class="card border-left-primary shadow h-100 py-2">
           <div class="card-body">
               <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                       <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Earnings (Monthly)</div>
                       <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                   </div>
                   <div class="col-auto">
                       <i class="fas fa-calendar fa-2x text-gray-300"></i>
                   </div>
               </div>
           </div>
       </div>
   </div> --}}
</div>
@endsection
