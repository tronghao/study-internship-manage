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
	Route::get('danh-sach-thuc-tap', 'AdminController@danhSachThucTap');
	Route::get('xoa-thuc-tap/{email?}', 'AdminController@xoaThucTap');
	Route::post('edit-thuc-tap/{email?}', 'AdminController@editThucTap');

	//Học vị
	Route::get('hoc-vi', 'AdminController@hienThiHocVi');
	Route::get('xoa-hoc-vi/{maHV}', 'AdminController@xoaHocVi');
	Route::post('them-hoc-vi', 'AdminController@themHocVi');
	Route::post('sua-hoc-vi/{maHV}', 'AdminController@suaHocVi');

	//Ngành
	Route::get('nganh', 'AdminController@hienThiNganh');
	Route::get('xoa-nganh/{maNganh}', 'AdminController@xoaNganh');
	Route::post('them-nganh', 'AdminController@themNganh');
	Route::post('sua-nganh/{maNganh}', 'AdminController@suaNganh');

	//Chức vụ
	Route::get('chuc-vu', 'AdminController@hienThiChucVu');
	Route::get('xoa-chuc-vu/{maCV}', 'AdminController@xoaChucVu');
	Route::post('them-chuc-vu', 'AdminController@themChucVu');
	Route::post('sua-chuc-vu/{maCV}', 'AdminController@suaChucVu');

	//Lớp
	Route::get('lop', 'AdminController@hienThiLop');
	Route::get('xoa-lop/{maLop}', 'AdminController@xoaLop');
	// Route::post('them-chuc-vu', 'AdminController@themChucVu');
	// Route::post('sua-chuc-vu/{maCV}', 'AdminController@suaChucVu');
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


Route::group(["middleware" => "NguoiHuongDan", "prefix" => "nguoi-huong-dan"], function(){
	Route::get('home', 'NguoiHuongDanController@index');
	Route::get('thong-tin-thuc-tap', 'NguoiHuongDanController@thongTinThucTap');
});
