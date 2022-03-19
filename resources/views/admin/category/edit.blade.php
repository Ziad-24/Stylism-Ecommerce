@extends('layouts.app')

@section('content')
<a href="{{route('admin.category.all')}}" class="btn btn-primary">Go back to view all</a>
<div class="container justify-content-center align-items-center d-flex">

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    <div class="alert alert-success" role="alert" id ="successmsg" style="display:none;">
        Updated successfully
    </div>
          
    <div class="alert alert-success" role="alert" id ="failmsg" style="display:none;">
        Updating failed
    </div>

    <h1 class="display-3 text-dark">Update Category</h1>

    <form method="POST" id="categoryForm" class="text-light" >
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" value="{{$category->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Update Category">
            <small class="form-text text-danger" id="name_error"></small>
            </div>
       
        <div class="form-group" style="display: none;">
            <label for="exampleInputEmail1">id</label>
            <input type="text" class="form-control" value="{{$category->id}}"  name="id" id="categoryid" aria-describedby="emailHelp">
        </div>

        
        <button id="updateCategory" category_id="{{$category->id}}"  class="btn btn-primary mt-3">Update Category</button>
    </form>
    </div>

</div>
@stop

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@section('scripts')
<script>
    $(document).on('click','#updateCategory',function(event){
        event.preventDefault();
        $('#name_error').text('');
        var formData = new FormData($('#categoryForm')[0]);

        $.ajax({
        type: 'POST',
        url: `{{route('admin.category.update')}}`,
        data :  formData ,
        processData: false,
        contentType : false,
        cache : false,
        success : function(data){
            if(data.status == true)
            {
                $('#successmsg').show();
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