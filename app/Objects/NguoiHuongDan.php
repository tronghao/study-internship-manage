<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\NguoiHuongDanModel;

class NguoiHuongDan extends NguoiDung {

	private $nguoiHuongDan_table;

	public function __construct() {
		parent::__construct();
		$this->nguoiHuongDan_table = new NguoiHuongDanModel();
	}

	//==============================================================
	
	public function cap_nhat_du_lieu($email, $data) {
        $guest = $this->user->where('email', '=', $email)->first();
        $guest->sdt = $data["sdt"];
        $guest->loiGioiThieu = $data["loiGioiThieu"];
        $guest->save();

        $cb = new NguoiHuongDanModel();
        $cb->email = $email;
        $cb->maDonVi = $data["maDonVi"];
        $cb->maChucVu = $data["maChucVu"];
        $cb->save();
    }
	public function dang_ky_chon_sinh_vien_thuc_tap() {

	}

	public function them_danh_gia() {

	}

	public function xoa_danh_gia() {

	}

	public function sua_danh_gia() {

	}

	public function getUserByEmail($email) {
        $data = $this->user->where('email', '=', $email)->get()->toArray();
        $nguoiHD = new NguoiHuongDan();
        $nguoiHD->setData($data[0]["hoTen"], $data[0]["email"], $data[0]["trangThai"], $data[0]["anhDaiDien"], $data[0]["loaiUser"]);
        return $nguoiHD;
    }

    public function ton_tai( $email ) {
		$soLuong = $this->nguoiHuongDan_table->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
	}
}