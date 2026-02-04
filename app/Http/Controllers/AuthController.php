<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator ;
use Illuminate\View\View;
use App\Models\User;



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
        'name'=>'required|string|max:255',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|string|confirmed',
        'role'=>'required|in:admin,client',

      ]);


      // save in our data 
       User::create([
        'name'=>$request->name,
        'email' =>$request->email,
        'password' => Hash::make($request->pasword),
        'role' =>$request->role,
       ]);


       // take the user to login page
       return redirect()->route('login.form');

         
    }


    // show the form login
    public function showLoginForm(){
      return view('auth.login');
    }

    // creat function login
    public function login(Request $request){

    // let's make validtion about what he add

    $request->validate([
      'email'=>'required|email',
      'password'=>'required|string',



    ]);
      // let's see if that elmail in our database

     $user = User::where('email',$request->email)->First();
     if(!$user){
      return back()->withErrors(['email'=>'this email not found']);

     };

     if(!Hash::check($request->password,$user->password)){
        
      return back()->withErrors(['password'=>'this password is worng']);
     };

      // rigth now  save object user in sission
     Auth::login($user);


     return redirect()->route('products.index');
  
    

    }
    

}

