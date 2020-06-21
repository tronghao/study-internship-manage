<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\SinhVienModel;
use App\KinhPhiHoTroModel;
use App\DonViThucTapModel;
use App\Objects\DonVi;
use App\ThucTapModel;
use App\Objects\ThucTap;

class SinhVien extends NguoiDung {

	private $sinhVien_table;
	private $kinhPhi;
	private $donVi;
	private $thucTap;

	public function __construct() {
		parent::__construct();
		$this->sinhVien_table = new SinhVienModel();
		$this->kinhPhi = new KinhPhiHoTroModel();
		$this->donVi = new DonVi();
		$this->thucTap = new ThucTap();
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


	public function sua_Dang_ky() {

	}

	public function xem_diem() {

	}

	public function xem_danh_gia_tong_hop() {

	}

	public function ton_tai( $email ) {
		$soLuong = $this->sinhVien_table->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
	}

	public function getKinhPhiHoTro() {
		$duLieu = $this->kinhPhi->all();
		return $duLieu[0]["soTien"];
	}

	public function getSoKM( $email ) {
		$maDonVi = $this->thucTap->get_maDV_by_emailSV( $email );
		if( $maDonVi != null ) {
			return $this->donVi->getSoKMByMaDV( $maDonVi );
		}else return -1;
	}

	public function get_don_vi() {
		$data = $this->donVi->getAll();
		$dsDonVi = [];
		foreach ($data as $value) {
			$donVi_item = new DonVi($value["maDonVi"], $value["tenDonVi"], $value["diaChiDonVi"], $value["sdtDonVi"], $value["soKM"]);
			$dsDonVi[] = $donVi_item;
		}
		return $dsDonVi;
	}

	public function dang_ky_thuc_tap($id, $data) {
		try { 
		  	$thucTap = new ThucTapModel();
			$thucTap->idSinhVien = $id;
			$thucTap->maDonVi = $data["don-vi"];
			$thucTap->save();
		  	return true;
		} catch(\Illuminate\Database\QueryException $ex){ 
		  	return false;
		}
	}

	public function trangThaiDangKy($id) {
		$thucTap = new ThucTapModel();
		if( $thucTap->where('idSinhVien', '=', $id)->count() )
			return true;
		else return false;
	}

	public function getThucTap($id) {
		$thucTap = new ThucTapModel();
		$data = $thucTap->where('idSinhVien', '=', $id)->join('users','users.id', '=', 'thuctap.idSinhVien')->join('donvithuctap', 'donvithuctap.maDonVi', '=','thuctap.maDonVi')->get()->toArray();
		$thucTap_item = new ThucTap();
		$thucTap_item->setDataDonVi( null, $data[0]["tenDonVi"] );
		//$thucTap_item->setTenGiangVien( $data[0]["tenGi"] );
		return $thucTap_item;
	}
}