<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return "index";
    }
     public function show($id){
        return "show".$id;
    }
     public function create(){
        return "create";
    }


}
