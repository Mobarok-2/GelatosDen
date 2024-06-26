@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="container">
            @if(Session::has('update'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('update') }}</p>
            @endif
           </div>
          <div class="container">
            @if(Session::has('delete'))
                <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('delete') }}</p>
            @endif
           </div>
          <h5 class="card-title mb-4 d-inline">Bookings</h5>
        
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Booking Date</th>
                <th scope="col">Pepole</th>
                <th scope="col">Message</th>
                <th scope="col">Req. At</th>
                <th scope="col">Status</th>
                <th scope="col">Change Status</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <th scope="row">{{ $booking->id }}</th>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->num_pepole }}</td>
                        <td>{{ $booking->spe_request }}</td>
                        <td>{{ $booking->created_at }}</td>
                        <td>{{ $booking->status }}</td>
                        <td><a href="{{route ('bookings.edit', $booking->id)}}" class="btn btn-warning  text-center ">Change</a></td>
                        <td><a href="{{route ('bookings.delete', $booking->id)}}" class="btn btn-danger  text-center ">Delete</a></td>
                    </tr>
                @endforeach    
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

@endsection