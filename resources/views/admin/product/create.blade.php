@extends('layouts.app')


@section('content')
    <div class="container">
        <a href="{{route('admin.products.all')}}" class="btn btn-primary">All products</a>

        
        <form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
            @csrf
            <h1 class="display-4 text-align-center justify-content-center d-flex">Add your Product</h1>

            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
               {{ Session::get('success')}}
            </div>
            @endif
            <br>
            
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" value="{{old('photo')}}" class="form-control-file" name="photo" id="photo" placeholder="Enter Photo">
                @error('photo')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <br>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{old('name')}}" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Offer">
                @error('name')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <br>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" value="{{old('price')}}" class="form-control" name="price" id="price" placeholder="price">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
           
            <br>
           

            <div class="form-group">
                <label for="details">Details</label>
                <input type="text" value="{{old('details')}}" class="form-control" name="details" id="details" placeholder="details">
                @error('details')
                <span class="form-text text-danger">{{$message}}</span>
                @enderror
            </div>
           
            <br>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
                @error('category')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <br>
            <button type="submit" class="btn btn-success btn-block w-100">Add Product</button>
        </form>
    </div>

@endsection