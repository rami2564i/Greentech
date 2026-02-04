<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{


    //  see the page for singup
    public function showRegisterForm(){
      return view('auth.register');
    }
   //  creat fuction register
    public function register(Request $request){
      // validation info
      $request->validate([
        'name'=>'requide|string|max:255',
        'email'=>'requide|email|unique:users,email',
        'password'=>'requide|string|confirmed',
        'role'=>'requide|in:admin,client',

      ]);
        
    }
}

