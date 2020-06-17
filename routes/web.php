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
Route::get('logout', 'GuestController@logout');
Route::match(['get', 'post'], 'register', function(){
    return redirect('/');
});


Route::get('google-callback', 'GoogleController@callback');

Route::post('thong-tin-sinh-vien/{email}', 'GuestController@insertSinhVien');
Route::post('thong-tin-giang-vien/{email}', 'GuestController@insertGiangVien');
Route::post('thong-tin-can-bo/{email}', 'GuestController@insertCanBo');

Route::get('thong-bao/{id}', 'GuestController@hienThiThongBao');

//middleware - người hướng dẫn
Route::get('nguoi-huong-dan/home', 'NguoiHuongDanController@index');


Route::group(["middleware" => "Admin", "prefix" => "admin"], function(){
	Route::get('home/{menu?}/{success?}', 'AdminController@home');
	Route::get('thong-bao', 'AdminController@hienThiThongBao');
	Route::post('them-thong-bao', 'AdminController@themThongBao');
	Route::get('xoa-thong-bao/{id}', 'AdminController@xoaThongBao');
	Route::post('sua-thong-bao/{id}', 'AdminController@suaThongBao');

	//Quản trị kinh phí
	Route::get('kinh-phi', 'AdminController@hienThiKinhPhi');
	Route::post('cap-nhat-kinh-phi', 'AdminController@capNhatKinhPhi');

	//Quản trị đơn vị
	Route::get('don-vi', 'AdminController@hienThiDonVi');
	Route::get('xoa-don-vi/{maDV}', 'AdminController@xoaDonVi');

	//Duyệt User
	Route::get('chua-duyet', 'AdminController@danhSachChuaDuyet');
	Route::get('duyet-user/{id}', 'AdminController@duyetUser');
	Route::get('xoa-user/{id}', 'AdminController@xoaUser');
});

// Route::group(["middleware" => "Admin", "prefix" => "admin"], function(){

	
// });
