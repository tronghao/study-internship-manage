<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\NguoiHuongDanModel;
use App\Objects\ThucTap;
use App\Objects\Option;

class NguoiHuongDan extends NguoiDung {

	private $nguoiHuongDan_table;
	private $thucTap;

	public function __construct() {
		parent::__construct();
		$this->nguoiHuongDan_table = new NguoiHuongDanModel();
		$this->thucTap = new ThucTap();
        $this->option = new Option();
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

    public function thongTinThucTap( $emailNHD ) {
    	return $this->thucTap->getAllThongTinThucTapByEmailNHD('emailNHD', $emailNHD, "nguoi-huong-dan"); 
    }

    public function cham_diem_thuc_tap($emailSV, $emailNHD, $data, $role) {
    	return $this->thucTap->cham_diem( $emailSV, $emailNHD, $data, $role );
    }

    public function ton_tai( $email ) {
		$soLuong = $this->nguoiHuongDan_table->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
	}

    public function choPhepChamDiem() {
        return $this->option->choPhepChamDiem();
    }
}