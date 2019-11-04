<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    //

    public function index(){

        $users=User::whereRoleId(2)->paginate(5);

        return view('admin.user')->with('users',$users);


    }

    public function destroy($id){

        User::find($id)->delete();
        Session::flash('delete_user','کاربر مورد نظر پاک شد');
        return redirect()->back();
    }


}
