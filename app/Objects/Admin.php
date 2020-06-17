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
		$this->thongBao = new ThongBaoModel();
		$this->kinhPhi = new KinhPhiHoTroModel();
		$this->donVi = new DonViThucTapModel();
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
		try {
			$tb_item = new ThongBaoModel();
			$tb_item->img = $fileName;
			$tb_item->title = $data["tieu-de"];
			$tb_item->content = $data["noi-dung"];
			$tb_item->quote = $data["trich-dan"];
			$tb_item->idAdmin = "335535";
			$tb_item->save();
			return true;
		} catch(\Illuminate\Database\QueryException $ex){ 
		  return false;
		}
	}

	//=====================================================================

	public function sua_thong_bao($id, $fileName, $data) {
		try {

			if($fileName == "giữ lại") {
				echo "abc";
				$tb_item = $this->thongBao->where('id', '=', $id)->first();
				$tb_item->title = $data["tieu-de"];
				$tb_item->content = $data["noi-dung"];
				$tb_item->quote = $data["trich-dan"];
				$tb_item->save();
			}
			else {
				echo "def";
				$tb_item = $this->thongBao->where('id', '=', $id)->first();
				$tb_item->img = $fileName;
				$tb_item->title = $data["tieu-de"];
				$tb_item->content = $data["noi-dung"];
				$tb_item->quote = $data["trich-dan"];
				$tb_item->save();
			}
			return true;
		} catch(\Illuminate\Database\QueryException $ex){ 
		  return false;
		}
	}

	//=====================================================================

	public function xoa_thong_bao($id) {
		try {
			$this->thongBao->where('id', '=', $id)->delete();
			return true;
		} catch(\Illuminate\Database\QueryException $ex){ 
		  return false;
		}
	}

	//=====================================================================

	public function hien_thi_thong_bao() {
		$duLieu = $this->thongBao->all();
		$listThongBao = [];
		foreach($duLieu as $value) {
			$thongBaoItem = new ThongBao($value["id"], $value["img"], $value["title"], $value["content"], $value["quote"]);
			$listThongBao[] = $thongBaoItem;
		}
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
		$duLieu = $this->donVi->all();
		$listDonVi = [];
		foreach($duLieu as $value) {
			$donViItem = new DonVi($value["maDonVi"], $value["tenDonVi"], $value["diaChiDonVi"], $value["sdtDonVi"], $value["soKM"]);
			$listDonVi[] = $donViItem;
		}
		return $listDonVi;
	}

	//=====================================================================

	public function xoa_don_vi($maDV) {
		try {
            $this->donVi->where('maDonVi', '=', $maDV)->delete();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
	}

	//=====================================================================

	//user
	 public function user_chua_duyet() {
        $data = $this->user->where('trangThai', '=', 'chờ duyệt')->get();
        $listUserChuaDuyet = [];
        foreach ($data as $value) {
            $tb = new NguoiDung();
            $tb->setEmail( $value["email"] );
            $tb->setHoTen( $value["hoTen"] );
            $tb->setLoiGioiThieu( $value["loiGioiThieu"] );
            $tb->setId( $value["id"] );

            $listThongBao[] = $tb;
        }

        return $listThongBao;
    }

    //=====================================================================

    public function xoa_user($id) {
        try {
            $this->user->where('id', '=', $id)->delete();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

    //=====================================================================

	public function duyet_user($id) {
		try {
            $userItem = $this->user->where('id', '=', $id)->first();
            $userItem->trangThai = "đã duyệt";
            $userItem->save();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
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

	public function danh_sach_user() {

	}

	public function danh_sach_don_vi_thuc_tap() {

	}

	//CRUD don vi thuc tap
	public function them_don_vi_thuc_tap() {

	}

	public function xoa_don_vi_thuc_tap() {

	}

	public function sua_don_vi_thuc_tap() {

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