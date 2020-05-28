<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\GiangVienModel;

class GiangVien extends NguoiDung {

	private $giangVien; 

	public function __construct() {
		parent::__construct();
		$this->giangVien = new GiangVienModel();
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
		$soLuong = $this->giangVien->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
	}
}