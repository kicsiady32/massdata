<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
       $this->validate($request,[
        'name'=>'required|max:255',
        'username'=>'required|max:255|unique:users',
        'email'=>'required|email|max:255|unique:users',
        'password'=>'required|confirmed'
       ]);

      $user =  User::create([
        'name'=>$request->name,
        'username'=>$request->username,
        'email'=>$request->email,
        'password'=>Hash::make($request->password)
       ]);

       $userRole = Role::where('name','user')->first();
       $user->roles()->attach($userRole);
       auth()->attempt($request->only('username','password'));
       


       return redirect()->route('dashboard');
    }
}
