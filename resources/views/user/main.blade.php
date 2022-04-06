@extends('layouts.app')

@section('head')
    <title>Stylism</title>
    @include('includes.cssfiles')
@endsection

@section('content')

    {{-- @include('includes.nav') --}}
    @include('includes.header')

    <div class="container px-4 px-lg-5 mt-5"> 
        {{-- container start --}}

        {{-- Which category --}}
        <div class="justify-content-evenly text-align-center align-items-baseline d-flex py-2">
            <h1 class="">Latest Products</h1>
            <a href="{{route('site.latestProducts')}}" class="text-dark">View Latest Product </a>
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
                            {{$product->price}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex align-items-baseline justify-content-around">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>

                    {{-- <add-to-cart></add-to-cart> --}}
                </div>
            </div>
            @endforeach
        </div>
        {{-- end items in category --}}

        {{-- Which category --}}
        <div class="justify-content-around text-align-center align-items-baseline d-flex">
            <h1 class="">Categories</h1>

            <a href="{{route('site.allCategories')}}" class="text-dark">View All Categories</a>
            <br>
        </div>

        {{-- categories --}}
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($allCategories as $category)
            <div class="col-3">
                <a href="{{route('site.productInCategoryFromCategory',$category->id)}}" class="btn btn-primary ">{{$category->name}}</a>    
            </div>
            @endforeach
        
        </div> 
        



        {{-- container end --}}
    </div>
        


    @include('includes.footer')
@endsection