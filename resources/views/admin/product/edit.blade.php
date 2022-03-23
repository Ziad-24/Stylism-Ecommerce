@extends('layouts.app')

@section('content')
<a href="{{route('admin.products.all')}}" class="btn btn-primary">Go back to view all</a>
<div class="container justify-content-center align-items-center d-flex">

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="alert alert-success" role="alert" id ="successmsg" style="display:none;">
        Updated successfully
    </div>
          
    <div class="alert alert-danger" role="alert" id ="failmsg" style="display:none;">
        Updating failed
    </div>

    <h1 class="display-3 text-dark">Update Product</h1>

    <form method="POST" id="productForm" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="photo">Photo</label>
            <br>
            @error('photo')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        
        <img src="/storage/{{$product->img}}" alt="product image" width="120px" height="auto">
        <br>
        <input type="file" class="form-control-file" name="photo" id="photo" placeholder="Enter Photo">


        <br>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}" id="name" aria-describedby="emailHelp" placeholder="Enter Offer">
            @error('name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <br>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}" id="price" placeholder="price">
            @error('price')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
       
        <br>
       

        <div class="form-group">
            <label for="details">Details</label>
            <input type="text" class="form-control" name="details" value="{{$product->details}}" id="details" placeholder="details">
            @error('details')
            <span class="form-text text-danger">{{$message}}</span>
            @enderror
        </div>
       
        <br>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
                @foreach ($categories as $category)
                    <option
                    @if ($product->category_id == $category->id)
                        selected
                    @endif
                    value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
            @error('category')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group" style="display: none;">
            <label for="exampleInputEmail1">id</label>
            <input type="text" class="form-control" value="{{$product->id}}"  name="id" id="productid" aria-describedby="emailHelp">
        </div>

        <br>
        
        <button id="updateProduct" product_id="{{$product->id}}"  class="btn btn-primary mt-3">Update Product</button>
    </form>
    </div>

</div>
@stop

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@section('scripts')
<script type="application/javascript">
    $(document).on('click','#updateProduct',function(event){
        event.preventDefault();
        $('#name_error').text('');
        var formData = new FormData($('#productForm')[0]);

        $.ajax({
        type: 'POST',
        enctype : 'multipart/data-form', 
        url: `{{route('admin.product.update')}}`,
        data :  formData ,
        processData: false,
        contentType : false,
        cache : false,
        success : function(data){
            if(data.status == true)
            {
                $('#successmsg').show();
            }
            else
            {
                $('#failmsg').show();   
            }
        },
        error : function(reject){
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors , (key,val) => {
                $(`#${key}_error`).text(val[0]);
            })
        }
        })
    })
</script>

@stop