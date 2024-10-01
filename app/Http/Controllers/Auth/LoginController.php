<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class LoginController extends Controller
{
public function showLoginForm(){
   return view('login');
}
public function userlogin(Request $request){
    // dd($request->all());
    // dd(Auth::guard('web'));
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
// dd('hello');
// dd(Auth::guard('web'));
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('create');
            // dd("hello");
            // return "hello";
        }else{
            Session::flash('error-message','Invalid Email or Password');
            return back();
        }
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
}
