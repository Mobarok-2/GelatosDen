@extends('layouts.admin')

@section('content')

  
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">

          <div class="container">
            @if(Session::has('success'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
            @endif
           </div>

          <h5 class="card-title mb-4 d-inline">Orders</h5>
        
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Town</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                <th scope="col">Change Status</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td><small>{{$order->name}}</small> </td>
                    <td><small>{{$order->email}}</small></td>
                    <td><small>{{$order->town}}</small></td>
                    <td><small>{{$order->phone_number}}</small></td>
                    <td><small>{{$order->address}}</small></td>
                    <td><small>${{$order->price}}</small></td>
                    <td><small>{{$order->status}}</small></td>
                    <td><small><a href="{{route('orders.edit', $order->id)}}" class="btn btn-warning  text-center ">Change</a></small></td>
                    <td><small><a href="#" class="btn btn-danger  text-center ">Delete</a></small></td>
              @endforeach  
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>
  @endsection