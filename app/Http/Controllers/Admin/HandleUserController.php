<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HandleUserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::select('id','name','utype','email')->get();
        $counter = 0;
        return view('admin.user.all' , compact('users' , 'counter'));
    }    
    
    public function viewUser(Request $request)
    {
        $user = User::find($request->id);
        // return $user;
        return view('admin.user.viewuser',compact('user'));
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request -> id);
        if(!$user)
        {
            // add current lines inside the all categories page
            return response() -> json([
                'status' => false ,
                'message' => 'User removal failed',
                'data' => $request -> id,
            ]);
        }

        $user->delete();

        return response() -> json([
            'status' => true ,
            'message' => 'User Deleted Successfully',
            'id' => $request -> id,
        ]);
    }

    public function changeUserRole(Request $request)
    {
        $user = User::find($request->id);
        if($user->utype == 'admin')
        {
            $user->update([
                'utype' => 'user',
            ]);
        }
        else
        {
            $user->update([
                'utype' => 'admin',
            ]);
        }

        return redirect()->route('admin.user.view',$user->id);

    }
}
