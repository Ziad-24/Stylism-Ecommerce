@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="d-flex">
            <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Go back to view dashboard</a>
        
            <a href="#" class="btn btn-success">Add product "not functional"</a>
        </div>
        <h1 class="text-align-center justify-content-center d-flex display-3">{{$categoryName->name}}</h1>

        <table class="table">
            <thead class="display-4">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col"><a href="{{route('admin.category.all')}}" class="text-decoration-none text-dark">Category</a></th>
                <th scope="col">Operation</th>

            </tr>
            </thead>
            <tbody class="display-6">
                @foreach ($products as $product)  
                    <tr>
                        <th scope="row">{{$counter+=1}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td> <img src="/storage/{{$product->img}}" alt="product image" width="120px" height="auto"></td>
                        <td><a href="#" class="text-decoration-none">{{$product->category->name}}</a></td>
                        <td>
                            <a href="#" class="btn btn-warning">Update Product</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
           
            </tbody>
        </table>
    </div>

@endsection