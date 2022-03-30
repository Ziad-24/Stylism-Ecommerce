@extends('layouts.app')


@section('content')

    <div class="container">
        <div>
            <h1 class="justify-content-center text-align-center align-items-baseline d-flex">All Categories</h1>
        </div>

        <div class="row align-items-baseline pt-4">
            <ul class="col">
                <h1>Men Categories</h1>
                @foreach ($menCategories as $category)
                <a href="{{route('site.productInCategoryFromCategory',$category->id)}}" class="text-decoration-none text-dark">
                    <li class="p-1"><h3>{{$category->name}}</h3></li>
                </a>    
                
                @endforeach
            </ul>
            
            <ul class="col">
                <h1>Women Categories</h1>
                @foreach ($womenCategories as $category)
                <a href="{{route('site.productInCategoryFromCategory',$category->id)}}" class="text-decoration-none text-dark">
                    <li class="p-1"><h3>{{$category->name}}</h3></li>
                </a>    
                
                @endforeach
            </ul>

            
        </div>


    </div>
    @include('includes.footer')

@endsection