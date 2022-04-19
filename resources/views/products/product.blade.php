@extends('layouts.app')

@section('head')
    <title>Stylism</title>
    @include('includes.cssfiles')
    @include('includes.singleitemcss')
@endsection

@section('content')
{{-- <h1 class="display-1">TO ADD PAGINATION AT THE BOTTOM AND CATEGORY SECTION ON POST</h1> --}}


    <!-- Product section-->
    <section class="py-3">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/storage/{{$product->img}}" alt="..." /></div>
                <div class="col-md-6">
                    {{-- <div class="small mb-1">SKU: BST-498</div> --}}
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="fs-5 mb-5">
                        {{-- <span class="text-decoration-line-through">{{$product->price}}</span> --}}
                        <span>${{$product->price}}</span>
                        {{-- <span>$40.00</span> --}}
                    </div>
                    <p class="lead">{{$product->details}}</p>
                    <div class="d-flex">
                        @auth
                            
                            <add-cart user-id={{auth()->user()->id}} product-id={{$product->id}} in-cart={{$hasInCart}}></add-cart> 
                            
                        @else
                            <a class="btn btn-outline-dark flex-shrink-0" href="{{route('login')}}">
                                <i class="bi-cart-fill me-1"></i>
                                Add To Cart
                            </a>
                        @endif
                    </div>
                    <br>
                    <br>
                    <div class="d-flex text-dark align-items-baseline">
                        <h4 class="bold">Category: &nbsp;</h4>
                        <a href="{{route('site.productInCategoryFromCategory',$product->category_id)}}" class="text-decoration-none" style="color: blue;"><h5>{{$product->category->name}}</h5></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <hr>
    {{-- related items --}}
    <section class="py-3 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($relatedProducts as $relatedProduct) 
                @if($relatedProduct->id != $product->id)   
                    <div class="col mb-5">
                        <div class="card h-100">
                           <!-- Product image-->
                            <a href="{{route('site.product',$relatedProduct->id)}}">
                                <img class="card-img-top" src="/storage/{{$relatedProduct->img}}" alt="{{$relatedProduct->name}} img is missing" />
                            </a>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                <!-- Product name-->
                                <a href="{{route('site.product',$relatedProduct->id)}}" class="text-decoration-none text-dark">
                                    <h5 class="fw-bolder">{{$relatedProduct->name}}</h5>
                                </a>
                                    <!-- Product price-->
                                    ${{$relatedProduct->price}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="{{route('site.product',$relatedProduct->id)}}">View Product</a></div>
                            </div>  
                        </div>
                    </div>
                @endif
                @endforeach
               
        </div>
    </section>

    @include('includes.footer')

@endsection