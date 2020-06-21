<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\ThongBaoModel;
use App\Objects\ThongBao;
use App\KinhPhiHoTroModel;
use App\DonViThucTapModel;
use App\Objects\DonVi;

class Admin extends NguoiDung {

	private $password;
	private $thongBao;
	private $kinhPhi;
	private $donVi;

	public function __construct() {
		parent::__construct();
		$this->thongBao = new ThongBao();
		$this->kinhPhi = new KinhPhiHoTroModel();
		$this->donVi = new DonVi();
    }

    //=====================================================================

	//getter and setter
	/**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    //=====================================================================

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

    //=====================================================================


	//CRUD thong bao
	public function them_thong_bao($data, $fileName) {
		return $this->thongBao->them_thong_bao( $data, $fileName );
	}

	//=====================================================================

	public function sua_thong_bao($id, $fileName, $data) {
		return $this->thongBao->sua_thong_bao( $id, $fileName, $data );
	}

	//=====================================================================

	public function xoa_thong_bao($id) {
		return $this->thongBao->xoa_thong_bao( $id );
	}

	//=====================================================================

	public function hien_thi_thong_bao() {
		$listThongBao = $this->thongBao->getAll();
		return $listThongBao;
	}

	//=====================================================================

	public function hien_thi_kinh_phi() {
		$duLieu = $this->kinhPhi->all();
		return $duLieu[0];
	}

	//=====================================================================

	public function cap_nhat_kinh_phi($kp) {
		try { 
			$duLieu = $this->kinhPhi->where('idKinhPhi', '=', 1)->first();
			$duLieu->soTien = $kp;
			$duLieu->save();
			return true;
		} catch(\Illuminate\Database\QueryException $ex){ 
		  	return false;
		}
		
	}

	//=====================================================================

	public function hien_thi_don_vi() {
		return $this->donVi->getAll();
	}

	//=====================================================================

	public function xoa_don_vi($maDV) {
		return $this->donVi->xoa_don_vi( $maDV );
	}

	//=====================================================================

	public function them_don_vi($data) {
		return $this->donVi->them_don_vi( $data );
	}

	//=====================================================================

	public function sua_don_vi($maDV, $data) {
		return $this->donVi->sua_don_vi( $maDV, $data );
	}

	//=====================================================================

	//user
	 public function danh_sach_user() {
        return $this->getAll();
    }

	//=====================================================================

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


	public function danh_sach_don_vi_thuc_tap() {

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