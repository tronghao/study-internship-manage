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
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin2']);
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
	Route::post('them-don-vi', 'AdminController@themDonVi');
	Route::post('sua-don-vi/{maDV}', 'AdminController@suaDonVi');

	//Duyệt User
	Route::get('danh-sach-user', 'AdminController@danhSachUser');
	Route::get('duyet-user/{email}', 'AdminController@duyetUser');
	Route::get('xoa-user/{email}', 'AdminController@xoaUser');
	Route::post('edit-user/{email}', 'AdminController@suaUser');

	//Danh sách thực tập
	Route::get('admin/danh-sach-thuc-tap', 'AdminController@danhSachThucTap');
});

Route::group(["middleware" => "SinhVien", "prefix" => "sinh-vien"], function(){
	Route::get('home/{id?}/{menu?}', 'SinhVienController@home');
	Route::get('kinh-phi', 'SinhVienController@xemKinhPhi');
	Route::get('dang-ky-thuc-tap', 'SinhVienController@dangKyThucTap');
	Route::post('dang-ky-thuc-tap', 'SinhVienController@xuLyDangKyThucTap');
	Route::post('cap-nhat-dang-ky-thuc-tap', 'SinhVienController@capNhatDangKyThucTap');
	Route::get('xoa-dang-ky', 'SinhVienController@xoaDangKyThucTap');
	Route::get('xem-diem', 'SinhVienController@xemDiem');
});


// Route::group(["middleware" => "Admin", "prefix" => "admin"], function(){

	
// });
