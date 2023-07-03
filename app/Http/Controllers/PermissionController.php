<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {   
        if(Gate::denies('edit-users')){
            return redirect(route('dashboard'));
        }
        $users = User::all();
        return view('layout.permissions')->with('users',$users);
    }
    public function edit(User $user){
        $roles = Role::all();
        return view('layout.edit_permissions')->with([
            'user'=>$user,
            'roles'=> $roles
        ]);
    }

    public function update(Request $request, $user_Id){
        $user = User::find($user_Id);
        $user->roles()->sync($request->roles);

        return redirect()->route('permissions');
    }
}
