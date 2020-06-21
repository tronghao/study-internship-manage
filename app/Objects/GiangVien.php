<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\GiangVienModel;

class GiangVien extends NguoiDung {

	private $giangVien_table; 

	public function __construct() {
		parent::__construct();
		$this->giangVien_table = new GiangVienModel();
	}

	//==============================================================
	
	public function cap_nhat_du_lieu($email, $data) {
        $guest = $this->user->where('email', '=', $email)->first();
        $guest->sdt = $data["sdt"];
        $guest->loiGioiThieu = $data["loiGioiThieu"];
        $guest->save();

        $gv = new GiangVienModel();
        $gv->email = $email;
        $gv->maHocVi = $data["maHocVi"];
        $gv->save();
    }



	public function dang_ky_chon_sinh_vien_thuc_tap() {

	}

	public function them_danh_gia() {

	}

	public function xoa_danh_gia() {

	}

	public function sua_danh_gia() {

	}

	public function ton_tai( $email ) {
		$soLuong = $this->giangVien_table->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
	}
}