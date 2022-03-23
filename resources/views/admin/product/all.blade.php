@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="d-flex">
            <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Go back to view dashboard</a>
        
            <a href="{{route('admin.product.create')}}" class="btn btn-success">Add product</a>
        </div>

        <div class="alert alert-success display-5" role="alert" id ="successmsg" style="display:none;">
            Deleted successfully
        </div>
            
        <div class="alert alert-success display-5" role="alert" id ="failmsg" style="display:none;">
            Deleting failed
        </div>
        <br>
        <h1 class="text-align-center justify-content-center d-flex display-3" >All Products</h1>
        <table class="table display-6">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col"><a href="{{route('admin.category.all')}}" class="text-decoration-none text-dark">Category</a></th>
                <th scope="col">Operation</th>

            </tr>
            </thead>
            <tbody style="font-size: 2rem">
                @foreach ($products as $product)  
                    <tr class="productRow{{$product->id}}">
                        <th scope="row">{{$counter+=1}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td> <img src="/storage/{{$product->img}}" alt="product image" width="120px" height="auto"></td>
                        <td><a href="{{  route('admin.category.withid',$product->category_id)   }}" class="text-decoration-none">{{$product->category->name}}</a></td>
                        <td>
                            <a href="#" class="btn btn-warning">Update Product</a>
                            <a href="#" product_id="{{$product->id}}" class="btn btn-danger deletebtn">Delete</a>
                        </td>
                    </tr>
                @endforeach
           
            </tbody>
        </table>
    </div>

@endsection



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@section('scripts')
<script type="application/javascript">
    //deleting button
    $(document).on('click','.deletebtn',function(event){
        event.preventDefault();

        var productid = $(this).attr('product_id');
        $.ajax({
            type: 'POST',
            enctype : 'multipart/data-form', 
            url: "{{route('admin.product.delete')}}",
            data : {
                '_token' : "{{csrf_token()}}",
                'id' : productid,
        } ,
        // processData: false,
        // contentType : false,
        // cache : false,
        success : function(data){
            if(data.status == true)
            {
                $('#successmsg').show();

            }
                $(".productRow"+data.id).remove();
        },
        error : function(data){
            
        }
        })
    });

</script>

@endsection