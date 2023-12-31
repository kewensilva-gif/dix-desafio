<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Route::prefix('noticias')->group(function() {
	Route::resource('/', NoticiaController::class);
	Route::get('/{id}/edit', [NoticiaController::class,'edit'])->where('id', '[0-9]+')->name('noticias-edit');
	Route::put('/{id}', [NoticiaController::class,'update'])->where('id', '[0-9]+')->name('noticias-update');
	Route::delete('/{id}', [NoticiaController::class,'destroy'])->where('id', '[0-9]+')->name('noticias-destroy');
});

Route::group(['middleware'=> 'admin'], function () {
	Route::get('admin/list_users', [UserController::class,'getUsers'])->name('admin-getUsers');
	Route::get('admin/user/{id}/edit', [UserController::class,'edit'])->where('id', '[0-9]+')->name('admin-user-edit');
	Route::put('admin/user/{id}', [UserController::class, 'update'])->where('id', '[0-9]+')->name('admin-user-update');
	Route::delete('admin/user/{id}', [UserController::class, 'destroy'])->where('id', '[0-9]+')->name('admin-user-destroy');
});