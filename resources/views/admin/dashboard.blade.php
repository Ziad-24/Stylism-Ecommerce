@extends('layouts.app')


@section('content')

    <div class="container">
    
        <div>
            <h1 class="display-3 justify-content-center align-items-center d-flex">Welcome {{auth()->user()->name}} to the Admin Dashboard</h1> 

        </div>
    
       
       <div>
           <a href="{{route('admin.category.all')}}" class="btn btn-success">View All Categories</a>
           <a href="{{route('admin.users.all')}}" class="btn btn-primary">View All Users</a>
           <a href="{{route('admin.products.all')}}" class="btn btn-primary">View All Products</a>
        </div>
        
    </div>
@endsection