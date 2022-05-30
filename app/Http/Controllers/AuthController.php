<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function login (Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            "email"=>"required",
            "password" =>"required"
        ]);

        if($validator->fails()){
            return back() -> withErrors($validator->errors());
        }

        if($request->remember){
            Cookie::queue('remembercookie', $request->email, 5);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
            Session::put('usersession',['email' => $request->email, 'password' => $request->password]);
            return redirect('/kategori');
        }
        return back() -> withErrors('Name or Password are invalid');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
