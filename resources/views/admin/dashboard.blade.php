@extends('layouts.app')


@section('content')

    <div class="container">
    
        <div>
            <h1 class="display-3 justify-content-center align-items-center d-flex">Welcome {{auth()->user()->name}} to the Admin Dashboard</h1> 

        </div>
    
       
       <div>
           <a href="{{route('admin.category.all')}}" class="btn btn-success">View All Categories</a>
        </div>
        
    </div>
@endsection