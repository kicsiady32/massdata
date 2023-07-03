<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function username(){
        return 'username';
    }
    public function store(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
           ]);

           if(auth()->attempt($request->only('username','password'))){
            return redirect()->route('dashboard');
           } else {
            return redirect()->route('login');
           };

          
    }
}
