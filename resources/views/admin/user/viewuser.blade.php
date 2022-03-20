@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{route('admin.users.all')}}" class="btn btn-primary">Go back</a>
        <div class="form-group">
          <label for="name">Name </label>
          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" disabled>
        </div>
        <br>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$user->email}}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        
        <br>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone"  value="{{$user->phone}}" disabled>
        </div>
        
        <br>

        <div class="container d-flex">
            
        @if ($user->utype != 'admin')
            <a href="{{route('admin.user.changeRole',$user->id)}}" class="btn  btn-warning btn-block w-100">Make Admin</a>
        @else
            <a href="{{route('admin.user.changeRole',$user->id)}}" class="btn  btn-secondary btn-block w-100">Make User</a>    
        @endif


        </div>
    </div>

@endsection