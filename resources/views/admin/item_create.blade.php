@extends('layouts.master')
@section('title','Item Create')
@section('content')
    <div class="container mt-5">
        <div class="col-md-8 offset-md-2">
            <legend>Create Product</legend>
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
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if(Auth::check())
                <div class="form-group">
                    <label for="examplename">Item Name</label>
                    <input type="text" name="name" class="form-control" id="examplename" 
                        placeholder="Item Name">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                </div>
                @endif
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" id="price" 
                        placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="img">Image Upload</label>
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="File">
                        <label class="custom-file-label" for="File"></label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" name="color" class="form-control" id="color" 
                        placeholder="eg. White | Black">
                </div> 
                <div class="form-group">
                    <label for="color">Size</label>
                    <input type="text" name="size" class="form-control" id="size" 
                        placeholder="eg. XL | L (or) 30 | 31">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>     
                
            </form>
        </div>
    </div>
@endsection