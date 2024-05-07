@extends('layouts.admin')

@section('content')

  
<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
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
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->town}}</td>
                    <td>{{$order->phone_number}}</td>
                    <td>{{$order->address}}</td>
                    <td>${{$order->price}}</td>
                    <td>{{$order->status}}</td>
                    {{-- {{route('orders.delete', ['id' => $order->id])}} --}}
                    <td><a href="#" class="btn btn-warning  text-center ">Change</a></td>
                    <td><a href="#" class="btn btn-danger  text-center ">Delete</a></td>
              @endforeach  
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>@endsection