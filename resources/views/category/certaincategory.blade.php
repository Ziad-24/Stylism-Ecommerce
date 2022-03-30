@extends('layouts.app')

@section('content')

    <div class="container px-4 px-lg-5 mt-5"> 
        {{-- container start --}}

        {{-- Which category --}}
        <div class="">
            <h1 class="justify-content-evenly text-align-center align-items-baseline d-flex">Category : {{$category->name}}</h1>
            
            <br>
        </div>
        

        {{-- items in category --}}
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> 
            @foreach ($products as $product)    
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
                </div>
            </div>
            @endforeach
        </div>
        {{-- end items in category --}}
    </div>
    <div class="container justify-content-center align-items-center d-flex">{{$products->links()}}</div>

    @include('includes.footer')

@endsection