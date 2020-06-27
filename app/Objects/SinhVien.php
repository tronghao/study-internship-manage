<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\SinhVienModel;
use App\KinhPhiHoTroModel;
use App\DonViThucTapModel;
use App\Objects\DonVi;
use App\ThucTapModel;
use App\Objects\ThucTap;
use App\Objects\Diem;
use App\Objects\Option;

class SinhVien extends NguoiDung {

	private $sinhVien_table;
	private $kinhPhi;
	private $donVi;
	private $thucTap;
	private $diem;
	private $option;

	public function __construct() {
		parent::__construct();
		$this->sinhVien_table = new SinhVienModel();
		$this->kinhPhi = new KinhPhiHoTroModel();
		$this->donVi = new DonVi();
		$this->thucTap = new ThucTap();
		$this->diem = new Diem();
		$this->option = new Option();
	}

	//==============================================================
	
	public function cap_nhat_du_lieu($email, $data) {
        $guest = $this->user->where('email', '=', $email)->first();
        $guest->sdt = $data["sdt"];
        $guest->loiGioiThieu = $data["loiGioiThieu"];
        $guest->save();

        $sv = new SinhVienModel();
        $sv->email = $email;
        $sv->maLop = $data["maLop"];
        $sv->save();
    }

    //==============================================================
	
	public function xem_diem( $email ) {
		return $this->diem->getThongTinDiem( $email );
	}

	//==============================================================
	
	public function ton_tai( $email ) {
		$soLuong = $this->sinhVien_table->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
	}

	//==============================================================

	public function getKinhPhiHoTro() {
		$duLieu = $this->kinhPhi->all();
		return $duLieu[0]["soTien"];
	}

	//==============================================================
	
	public function getSoKM( $email ) {
		$maDonVi = $this->thucTap->get_maDV_by_emailSV( $email );
		if( $maDonVi != null ) {
			return $this->donVi->getSoKMByMaDV( $maDonVi );
		}else return -1;
	}

	//==============================================================

	public function get_don_vi() {
		return $this->donVi->getAll();
	}

	//==============================================================

	public function dang_ky_thuc_tap($email, $data) {
		return $this->thucTap->dang_ky_thuc_tap( $email, $data );
	}

	//==============================================================

	public function cap_nhat_dang_ky($email, $data) {
		return $this->thucTap->cap_nhat_dang_ky( $email, $data );
	}

	//==============================================================

	public function xoa_dang_ky($email) {
		return $this->thucTap->xoa_dang_ky( $email );
	}

	//==============================================================

	public function trangThaiDangKy($email) {
		$thucTap = new ThucTapModel();
		if( $thucTap->where('emailSV', '=', $email)->count() )
			return true;
		else return false;
	}

	//==============================================================

	public function getThucTap($email) {
		$thucTap_item = $this->thucTap->getThucTapByEmail( $email );
		return $thucTap_item;
	}

	//==============================================================

	public function choPhepDangKy() {
		return $this->option->choPhepDangKy();
	}
}