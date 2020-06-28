@extends('layouts.master')
@section('title','Category Create')
@section('content')
    <div class="container mt-5">
        <div class="col-md-8 offset-md-2">
            <form method="post">
                @csrf
                @if(session('status'))
                    <p class="alert alert-success">{{session('status')}}</p>
                @endif
                <div class="form-group">
                    <label for="examplename">Add Category</label>
                    <input type="text" name="name" class="form-control" id="examplename" 
                        placeholder="Category Name">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            <div class="mt-2">
                <a href="{{url('admin/post/create')}}"><button class="btn btn-secondary"> Back </button></a>
            </div>
               
                
            
        </div>
    </div>
@endsection