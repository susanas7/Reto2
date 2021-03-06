<?php

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

Route::get('/', function () {

    $user=Auth::user();
    if(Auth::check())
    if($user->isAdmin()){
      return view('admin');
    }else{
      return view('user');
    }
    return view('welcome');
})->middleware('auth');

//registro de las rutas de verificacion
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
