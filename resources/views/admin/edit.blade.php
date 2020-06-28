@extends('layouts.master')
@section('title','Edit')
@section('content')
    <div class="container mt-5">
        <div class="col-md-8 offset-md-2">
            {{-- Success alert --}}
            @if(session('status'))
        <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">{{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
            <legend>Edit Product</legend>
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
            <a href="{{url('admin/category/create')}}"><button class="btn btn-secondary float-right">Add Category</button></a>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Select1">Choose Category</label>
                    <select class="form-control" id="Select1" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"
                        @if($post->category_id === $category->id)
                            selected="selected"
                        @endif
                    >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if(Auth::check())
                <div class="form-group">
                    <label for="examplename">Item Name</label>
                    <input type="text" name="name" class="form-control" id="examplename" 
                    value="{{$post->name}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                </div>
                @endif
                <div class="form-group">
                    <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5">{{$post->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" 
                value="{{$post->price}}">
                </div>
                
                <div class="row">
                    @foreach(unserialize($post->image) as $image)
                    <div class="col-md-3">
                        <img class="img-thumbnail" src="{{asset('/upload/'.$image)}}" alt="Image not abaliable">
                    </div>
                    @endforeach 
                </div>
                      
                <div class="form-group">
                    <label for="img">Image Upload</label>
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="File">
                        <label class="custom-file-label" for="File"></label>
                    </div>
                </div>  
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>    
            </form>
        </div>
    </div>
@endsection