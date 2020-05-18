<?php
namespace App;

use App\Objects\NguoiDung;

class Admin extends NguoiDung {

	private $password;

	public function __construct(){

    }

	//getter and setter
	/**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }





	//CRUD thong bao
	public function them_thong_bao() {

	}

	public function sua_thong_bao() {

	}

	
	public function xoa_thong_bao() {

	}


	//user
	public function duyet_user() {

	}

	public function xoa_user() {
	 
	}

	public function sua_user() {

	}


	//kinh phi
	public function sua_kinh_phi() {

	}


	//dang ky thuc tap
	public function xoa_dang_ky_thuc_tap() {

	}

	public function sua_dang_ky_thuc_tap($user, $noiDung) {

	}

	public function duyet_dang_ky_thuc_tap($user, $noiDung) {

	}

	//tim kiem
	public function tim_user($emailUser) {

	}

	public function ket_qua_thuc_tap_cua_mot_sinh_vien($emailSinhVien) {

	}

	public function chi_tiet_thuc_tap_cua_mot_sinh_vien($emailSinhVien) {

	}


	//danh sach
	public function danh_sach_thuc_tap() {

	}

	public function danh_sach_ket_qua() {

	}

	public function danh_sach_user() {

	}

	public function danh_sach_don_vi_thuc_tap() {

	}

	//CRUD don vi thuc tap
	public function them_don_vi_thuc_tap() {

	}

	public function xoa_don_vi_thuc_tap() {

	}

	public function sua_don_vi_thuc_tap() {

	}


	//CRUD hoc vi
	public function them_hoc_vi() {

	}

	public function xoa_hoc_vi() {

	}

	public function sua_hoc_vi() {

	}


	//CRUD lop
	public function them_lop() {

	}

	public function xoa_lop() {

	}

	public function sua_lop() {

	}


	//CRUD nganh
	public function them_nganh() {

	}

	public function xoa_nganh() {

	}

	public function sua_nganh() {

	}

}