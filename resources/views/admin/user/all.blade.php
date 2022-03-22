@extends('layouts.app')


@section('content')
    <div class="container">
                
        <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Go back to view dashboard</a>
        <a href="{{route('admin.user.addAdmin')}}" class="btn btn-primary">Add new Admin</a>
        

        <h1 class="text-align-center justify-content-center d-flex display-3" >All Users</h1>

        <table class="table ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                @if(auth()->user()->id != $user->id)
                <tr class="display-6 userRow{{$user->id}}">
                    <th scope="row">{{$counter+=1}}</th>
                    <td class="col-4">{{$user->email}}</td>
                    <td class="col-4">{{$user->utype}}</td>
                    <td class="col-4"> 
                        <a href="{{route('admin.user.view',$user->id)}}" class="btn btn-primary">View Details</a>

                        
                        <a href="#" user_id="{{$user->id}}" class="deletebtn btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endif
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

        var userid = $(this).attr('user_id');
        $.ajax({
        type: 'POST',
        enctype : 'multipart/data-form', 
        url: "{{route('admin.user.delete')}}",
        data : {
            '_token' : "{{csrf_token()}}",
            'id' : userid,
        } ,
        // processData: false,
        // contentType : false,
        // cache : false,
        success : function(data){
            if(data.status == true)
            {
                $('#successmsg').show();

            }
                $(".userRow"+data.id).remove();
        },
        error : function(data){
            
        }
        })
    });

</script>

@endsection