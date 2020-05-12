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

Route::get('/', 'GuestController@index');
Auth::routes();

Route::get('login', 'GuestController@index');
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});


Route::get('loginAfter', 'GuestController@handleLoginAfter');