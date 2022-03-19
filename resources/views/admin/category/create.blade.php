@extends('layouts.app')

@section('content')

<a href="{{route('admin.category.all')}}" class="btn btn-primary">Go back to view all</a>
    <div class="container ">



        <form method="POST" id="categoryForm" action="{{route('admin.category.store')}}">
           @csrf
            <div class="form-group w-100">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                    <small>{{$message}}</small>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary m-2 align-items-baseline">Add Category</button>
        </form>
    </div>

@endsection