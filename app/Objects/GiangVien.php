<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\Objects\ThucTap;
use App\GiangVienModel;

class GiangVien extends NguoiDung {

	private $giangVien_table; 
	private $thucTap;

	public function __construct() {
		parent::__construct();
		$this->giangVien_table = new GiangVienModel();
		$this->thucTap = new ThucTap();
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

	public function ton_tai( $email ) {
		$soLuong = $this->giangVien_table->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
	}

	public function thongTinThucTap( $emailNHD ) {
    	return $this->thucTap->getAllThongTinThucTapByEmailNHD('emailGV', $emailNHD, "giang-vien"); 
    }

    public function cham_diem_thuc_tap($emailSV, $emailNHD, $data, $role) {
    	return $this->thucTap->cham_diem( $emailSV, $emailNHD, $data, $role );
    }
}