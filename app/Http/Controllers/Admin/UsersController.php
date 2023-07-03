<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('edit-users')){
            return redirect(route('dashboard'));
        }
        $users = User::all();
        return view('layout.users')->with('users',$users);
    }
    public function addnewuser(){
        return view('layout.addnewuser');
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
            
            
     
     
            return redirect()->route('users');
         }
    

    public function edit(User $user)
    {;
        return view('layout.edit')->with([
            'user'=>$user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_Id)
    {
           $user = User::find($user_Id);
           $formFields = $request->validate([
            'name'=>'required',
            'username'=> 'required',
            'email'=>['required','email'],
           ]);
            $user->update($formFields);
          return redirect()->route('users');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users'));
    }


}
