@extends('layouts.master')
@section('title','Home Page')
@section('content')
<div class="container col-md-12">
    {{-- Slide Start --}}
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{url('/sliderimage/slide1.png')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('/sliderimage/slide2.png')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{url('/sliderimage/slide3.png')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
{{-- End Slide --}}
    <div class="container row col-md-12 mt-5">
        <!-- sidebar Start -->
        <div class="col-md-3">
            <div class="bg-light border-right" id="sidebar-wrapper">
                <!-- <div class="sidebar-heading"></div> -->
                <div class="list-group list-group-flush">
                    <a class="btn btn-secondary" href="{{ url('/') }}">Back</a>
                </div>
            </div>
        </div>
        <!-- sidebar end -->
        <div class="col-md-9 row">
        
        <!-- Show by category -->
        @forelse ($posts as $post)
        <div class="col-md-4 mt-3">
                <div class="card">
                    <img class="card-img-top" src="{{asset('/upload/'.unserialize($post->image)[0])}}" alt="Image not abaliable">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->name}}</h5>
                        <h5 class="card-title">Price : {{$post->price}} Ks</h5>
                        <p class="card-text">{{Str::limit($post->description,100)}}</p>
                        <a href="{{url("post/view/$post->id")}}" class="btn btn-primary">View Detail</a>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        @empty
        <div class="col-md-6 offset-md-3">
            <h3 class="alert alert-warning">There is no product to show!</h3>
        </div>
        @endforelse    
        </div>        
    </div>
</div>
@endsection