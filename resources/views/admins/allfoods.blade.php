@extends('layouts.admin')

@section('content')

 
  
  {{-- <div class="container">
    @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
    @endif
    </div> --}}

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
            <div class="container">
                @if(Session::has('delete'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('delete') }}</p>
                @endif
            </div>
          <h5 class="card-title mb-4 d-inline">Foods</h5>
          <a  href="{{ route('foods.create') }}" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
             @foreach($foods as $food)
                <tr>
                    <th scope="row">{{$food->id}}</th>
                    <td>{{$food->name}}</td>
                    <td><img width="50px" height="50px" src="{{asset('assets/img')}}/{{$food->image}}" alt=""></td>
                    <td>${{$food->price}}</td>
                    <td>{{$food->category}}</td>
                    <td><a href="" class="btn btn-danger  text-center ">Delete</a></td>
                    {{-- {{route('foods.delete', $food->id)}} --}}
                </tr>
             @endforeach
            </tbody>
          </table> 
        </div>
      </div>
    </div>
  </div>

  @endsection