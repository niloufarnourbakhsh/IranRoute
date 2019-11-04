<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    //
    public function create()
    {

        return view('user.contact');
        
    }

    public function store(Request $request)
    {

//        validate form
       $data=validator::make($request->all(),[
           'name'=>'required',
           'email'=>'required|email',
           'message'=>'required'
       ],[
           'name.required'=>'نام خود را وارد کنید',
           'email.required'=>'ایمیل خود را وارد کنید',
           'email.email'=>'ایمیل وارد شده نامعتبر است',
           'message.required'=>'متن پیام را وارد کنید',

       ])->validate();

       //send an email

       return view('user.contact');
    }
}
