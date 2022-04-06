@extends('layouts.app')

@section('head')
    <title>Latest Products</title>
    @include('includes.cssfiles')
@endsection


@section('content')

{{-- @include('includes.nav') --}}
    @include('includes.header')

    <div class="container px-4 px-lg-5 mt-5"> 
        {{-- container start --}}
        {{-- <h1 class="display-1">TO ADD RELATED AT THE BOTTOM</h1> --}}

        {{-- Which category --}}
        <div class="justify-content-center text-align-center align-items-baseline d-flex py-2">
            <h1 class="">Latest Products</h1>
            <br>
        </div>
        

        {{-- items in category --}}
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> 
            @foreach ($latestProducts as $product)    
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <a href="{{route('site.product',$product->id)}}">
                        <img class="card-img-top" src="/storage/{{$product->img}}" alt="{{$product->name}} img is missing" />
                    </a>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <a href="{{route('site.product',$product->id)}}" class="text-decoration-none text-dark">
                                <h5 class="fw-bolder">{{$product->name}}</h5>
                            </a>
                            <!-- Product price-->
                            ${{$product->price}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="{{route('site.product',$product->id)}}">View Product</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- end items in category --}}
        {{$latestProducts -> links()}}

    </div>

    @include('includes.footer')
@endsection