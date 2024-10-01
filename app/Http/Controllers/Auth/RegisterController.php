<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegistrationForm(){

        return view('register');
    }

    public function register(Request $request){
        // dd($request->all());
        $register = new User();
        $register->name=$request->name;
        $register->email=$request->email;
        $register->password=Hash::make($request->password);
        $register->save();
        return redirect(route('home'));
    }
}
