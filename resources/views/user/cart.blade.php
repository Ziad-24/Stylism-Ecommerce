@extends('layouts.app')


@section('content')
    <div class="container d-flex row ">
        {{-- show items in cart --}}
        <div class="col ">
            @foreach($products as $product)
                <div class="border row m-1 p-1">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <div class="col-11 d-flex justify-content-between">
                             
                        <img class="card-img-top" style="max-width: 100px; width: 60%;" src="/storage/{{$product->img}}" alt="{{$product->name}} img is missing" />
                        
                        <div>    
                            <div class=" align-items-baseline d-flex">
                                <p style="font-size: 30px">Name : {{$product->name}}</p>
                                <p style="font-size: 30px">Price : ${{$product->price}}</p>
                                
                            </div>
                            <br>
                            <div class="">
                                <p style="font-size: 25px">Details : {{$product->details}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            

        </div>

        {{-- side bar with price --}}
        <div class="col-4 border">
            <h2>Total items in cart is equal to ${{$total}}</h2>
        </div>
    </div>

@endsection