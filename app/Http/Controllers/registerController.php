<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    public function registerPage(){
        return view('register');
    }

    public function register(Request $request){
        // ngambil data user
        $data = $request->all();
        // syarat data
        $validator = Validator::make($data,[
            "name" => "required|unique:users|min:3|max:40",
            "email" => "required|unique:users|regex:/@gmail.com",
            "password"=>"required|min:6|max:12",
            "phone" => "required|"
        ]);
        //jika tidak memenuhi syarat data
        if($validator->fails()){
            return back() -> withErrors($validator->errors());
        }
        // jika memenuhi syarat
        $user = new User();        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);       
        $user->phone = $request->phone;        
        $user->save();
        return redirect('/home');
    }
}
