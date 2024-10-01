<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function create(){
        return view('crud');
    }

public function userlogin(Request $request){
    return "hello";
}
}
