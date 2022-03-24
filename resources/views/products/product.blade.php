@extends('layouts.app')

@section('head')
    <title>Stylism</title>
    @include('includes.cssfiles')
    @include('includes.singleitemcss')
@endsection

@section('content')
<h1 class="display-1">TO ADD PAGINATION AT THE BOTTOM AND CATEGORY SECTION ON POST</h1>


    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/storage/{{$product->img}}" alt="..." /></div>
                <div class="col-md-6">
                    {{-- <div class="small mb-1">SKU: BST-498</div> --}}
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">{{$product->price}}</span>
                        <span>$40.00</span>
                    </div>
                    <p class="lead">{{$product->details}}</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection