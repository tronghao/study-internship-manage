<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\SinhVienModel;

class SinhVien extends NguoiDung {

	private $sinhVien;

	public function __construct() {
		parent::__construct();
		$this->sinhVien = new SinhVienModel();
	}

	public function dang_ky_thuc_tap() {

	}

	public function sua_Dang_ky() {

	}

	public function xem_diem() {

	}

	public function xem_danh_gia_tong_hop() {

	}

	public function ton_tai( $email ) {
		$soLuong = $this->sinhVien->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
	}
}