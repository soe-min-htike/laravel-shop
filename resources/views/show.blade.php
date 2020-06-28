@extends('layouts.master')
@section('title','View Detail')
@section('content') 
    <div class="container">
        <div class="row mt-5">
        {{-- Success Message  --}}
        @if(session('status'))
        <div class="col-md-6 offset-md-3 alert alert-success alert-dismissible fade show" role="alert">{{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

            <div class="col-md-8 offset-col-md-2"><legend>{{ $post->name }}</legend></div>
            @foreach(unserialize($post->image) as $image)
            <div class="col-md-8 offset-md-2">
                <div>                    
                    <img class="card-img-top" src="{{asset('/upload/'.$image)}}" alt="Image not abaliable">
                </div>
            </div>
            @endforeach
            <div class="col-md-10 offset-md-1 mt-4">
                <h3 class="card-title">{{$post->name}}</h3>
                <h5 class="card-title">Price : {{$post->price}} Ks</h5>
                <p class="card-text">{{$post->description}}</p>
            </div>
        </div> 
    </div>
    <hr>
    <div class="container mt-3">
        <div class="col-md-8 offset-md-2">
            
            <legend>Order Form</legend>
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="examplename">Name</label>
                    <input type="text" name="name" class="form-control" id="examplename" 
                        placeholder="Name">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" class="form-control" id="phone" pattern="[0]{1}[0-9]{10}" 
                        placeholder="09 xxxxxxxxx">
                </div>
                <div class="form-group">
                    <label for="description">Address</label>
                    <textarea class="form-control" name="address" id="description" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                        <select class="custom-select mr-sm-2" name="quantity" id="quantity">
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option> 
                            <option value="6">6</option> 
                        </select>
                </div> 
                {{-- choose color --}}
                @if ($post->color!= null)
                <div class="form-check-inline">
                <label class="form-check-label">
                    <h4>Choose Color</h4>
                @foreach (unserialize($post->color) as $colo)
                <input type="radio" class="form-check-input" id="{{$colo}}" name="choose_color" value="{{$colo}}"><label for="{{$colo}}">{{$colo}}</label>&nbsp;&nbsp;
                @endforeach 
                </label>
                </div><br>
                @endif
                {{-- choose size --}}
                @if ($post->size != null)
                    <div class="form-check-inline">
                    <label class="form-check-label">  
                    <h4>Choose Size</h4>
                    @foreach (unserialize($post->size) as $siz)
                    <input type="radio" class="form-check-input" id="{{$siz}}" name="choose_size" value="{{$siz}}"><label for="{{$siz}}">{{$siz}}</label>&nbsp;&nbsp;
                    @endforeach 
                    </label>
                    </div>
                @endif
                
                <div class="mb-5">
                    <a class="btn btn-secondary" href="{{ url('/') }}">Back</a>
                    <button type="submit" class="btn btn-success">Buy Now</button>
                </div>   
            </form>
        </div>
    </div>

@endsection