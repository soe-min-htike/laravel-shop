@extends('layouts.master')
@section('title','Order')
@section('content')
    <div class="col-md-10 offset-md-1 mt-5">
        <legend>Order List</legend>
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Item</th>
                <th scope="col">Quantity</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>      
        <tbody>
        @forelse ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address}}</td>
                <td><a href="{{url("post/view/$order->post_id")}}" target="_blank">{{$order->post->name}}</a></td>
                <td>{{$order->quantity}}</td>
                <th>{{$order->quantity*$order->post->price}}</th>    
            </tr> 
        @empty
            <p>No Order to Show</p>
        @endforelse  
        </tbody>
        </table>
        
    </div>
@endsection