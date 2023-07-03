<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();

        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'username'=>'admin',
            'password'=>Hash::make('adminadmin')
        ]);

        $admin->roles()->attach($adminRole);
    }
}
