@extends('layouts.app')


@section('content')

    <div class="container">
                
        <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Go back to view dashboard</a>
        

        <div class="alert alert-success display-5" role="alert" id ="successmsg" style="display:none;">
            Deleted successfully
        </div>
            
        <div class="alert alert-success display-5" role="alert" id ="failmsg" style="display:none;">
            Deleting failed
        </div>

        <h1 class="text-align-center justify-content-center d-flex display-3" >All Categories</h1>

        <table class="table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    
                <tr class="display-6 categoryRow{{$category->id}}">
                    <th scope="row">{{$counter+=1}}</th>
                    <td class="col-6">{{$category->name}}</td>
                    <td class="col-6"> 
                        <a href="{{route('admin.category.withid',$category->id)}}"  class="btn btn-primary">View All Products</a>
                        <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-success">Change Name</a>
                        <a href="#" category_id ="{{$category->id}}" class="deletebtn btn btn-danger">Delete</a>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        <div class="container">
        <a href="{{route('admin.category.create')}}" class="btn btn-primary brn-block w-100">Add New Category</a>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@section('scripts')
<script type="application/javascript">
    //deleting button
    $(document).on('click','.deletebtn',function(event){
        event.preventDefault();

        var categoryid = $(this).attr('category_id');
        $.ajax({
            type: 'POST',
            enctype : 'multipart/data-form', 
            url: "{{route('admin.category.delete')}}",
            data : {
                '_token' : "{{csrf_token()}}",
                'id' : categoryid,
        } ,
        // processData: false,
        // contentType : false,
        // cache : false,
        success : function(data){
            if(data.status == true)
            {
                $('#successmsg').show();

            }
                $(".categoryRow"+data.id).remove();
        },
        error : function(data){
            
        }
        })
    });

</script>

@endsection