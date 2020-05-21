<?php
namespace App\Objects;

use App\Objects\NguoiDung;

class NguoiHuongDan extends NguoiDung {

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

}