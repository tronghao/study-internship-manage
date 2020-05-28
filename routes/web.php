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
//Route::get('abc/{id}', 'GuestController@handleGoogleLoginAfter');
Route::get('/', 'GuestController@index');
Route::get('home/{id?}', 'GuestController@index2');
Auth::routes();

Route::get('login', 'GuestController@index');
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});


Route::get('loginAfter', 'GuestController@handleLoginAfter');
Route::get('google-callback', 'GoogleController@callback');

Route::post('thong-tin-sinh-vien/{email}', 'GuestController@insertSinhVien');
Route::post('thong-tin-giang-vien/{email}', 'GuestController@insertGiangVien');
Route::post('thong-tin-can-bo/{email}', 'GuestController@insertCanBo');

//middleware - người hướng dẫn
Route::get('nguoi-huong-dan/home', 'NguoiHuongDanController@index');
