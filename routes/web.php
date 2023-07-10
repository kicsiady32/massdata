<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataImportController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[RegisterController::class,'index'])->name('/');

Route::get('/dashboard', [DashboardController::class,'index'] )->name('dashboard')->middleware('auth');
Route::get('/dashboard/manage/{dataname}', [DashboardController::class,'manage'] )->name('manage')->middleware('auth');
Route::get('/dashboard/manage-search', [DashboardController::class,'search'] )->name('manage.search')->middleware('auth');
Route::delete('/dashboard/manage-delete/{id}',[DashboardController::class,'destroy'])->name('manage-delete')->middleware('auth');


Route::get('/users',[UsersController::class,'index'])->name('users')->middleware('auth');
Route::get('/users/addnewuser',[UsersController::class,'addnewuser'])->name('addNewUser')->middleware('auth');
Route::post('/users/addnewuser/create',[UsersController::class,'store'])->name('storeNewUser');
Route::get('/users/{user}/edit',[UsersController::class,'edit'])->name('usersEdit')->middleware('auth');
Route::put('/users/{id}',[UsersController::class,'update'])->name('update')->middleware('auth');
Route::delete('/users/{user}',[UsersController::class,'destroy'])->name('usersDelete')->middleware('auth');

Route::get('/usersPermission',[PermissionController::class,'index'])->name('permissions')->middleware('auth');
Route::get('/userPermission/{user}/editPermission',[PermissionController::class,'edit'])->name('permissionEdit')->middleware('auth');
Route::put('/userPermission/{id}',[PermissionController::class,'update'])->name('permissionUpdate')->middleware('auth');

Route::get('/dataimport',[DataImportController::class,'index'])->name('dataImport')->middleware('auth');
Route::post('/dataimport',[DataImportController::class,'store'])->name('csvimport')->middleware('auth');


Route::post('/register',[RegisterController::class,'store'])->name('register');

Route::get('/login', [LoginController::class,'index'] )->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::get('/logout', [LogoutController::class,'store'] )->name('logout')->middleware('auth');;





