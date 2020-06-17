<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\Objects\ThongBao;
use App\ThongBaoModel;
use App\SinhVienModel;
use App\GiangVienModel;
use App\NguoiHuongDanModel;
use App\LopModel;
use App\Objects\Lop;
use App\HocViModel;
use App\Objects\HocVi;
use App\DonViThucTapModel;
use App\Objects\DonVi;
use App\ChucVuModel;
use App\Objects\ChucVu;


class Khach extends NguoiDung {
	private $thongbao_table;

	public function __construct() {
		parent::__construct();
		$this->thongbao_table = new ThongBaoModel();
	}

	public function get_3_thong_bao() {
		$data = $this->thongbao_table->whereRaw("1 = 1")->orderBy('id', 'DESC')->take(3)->get();
		$listThongBao = [];
		foreach ($data as $value) {
			$tb = new ThongBao($value["id"], $value["img"], $value["title"], $value["content"], $value["quote"]);

			$listThongBao[] = $tb;
		}
		return $listThongBao;
	}

    public function get_1_thong_bao($id) {
        $data = $this->thongbao_table->whereRaw("id = ?", [$id])->get();
        foreach ($data as $value) {
            $tb = new ThongBao($value["id"], $value["img"], $value["title"], $value["content"], $value["quote"]);

            return $tb;
        }
    }

	public function kiem_tra_ton_tai() {

	}

	public function them_du_lieu_dang_ky() {

	}

	public function getUserByEmail($email) {
        $data = $this->user->where('email', '=', $email)->get()->toArray();
        $khach = new Khach();
        $khach->setData($data[0]["hoTen"], $data[0]["email"], $data[0]["trangThai"], $data[0]["anhDaiDien"], $data[0]["loaiUser"]);
        return $khach;
    }

    public function cap_nhat_thong_tin($data, $user, $email) {
    	switch ($user) {
    		case 'sinhvien':
    			$guest = $this->user->where('email', '=', $email)->first();
		        $guest->sdt = $data["sdt"];
		        $guest->loiGioiThieu = $data["loiGioiThieu"];
		        $guest->save();

		        $sv = new SinhVienModel();
		        $sv->email = $email;
		        $sv->maLop = $data["maLop"];
		        $sv->save();
    			break;
    		case 'giangvien':
    			$guest = $this->user->where('email', '=', $email)->first();
		        $guest->sdt = $data["sdt"];
		        $guest->loiGioiThieu = $data["loiGioiThieu"];
		        $guest->save();

		        $gv = new GiangVienModel();
		        $gv->email = $email;
		        $gv->maHocVi = $data["maHocVi"];
		        $gv->save();
    			break;
    		case 'canbo':
    			$guest = $this->user->where('email', '=', $email)->first();
		        $guest->sdt = $data["sdt"];
		        $guest->loiGioiThieu = $data["loiGioiThieu"];
		        $guest->save();

		        $cb = new NguoiHuongDanModel();
		        $cb->email = $email;
		        $cb->maDonVi = $data["maDonVi"];
		        $cb->maChucVu = $data["maChucVu"];
		        $cb->save();
    			break;
    	}
    }

    public function getAllLop() {
    	$duLieuLop = LopModel::all();
    	$data = [];
    	foreach ($duLieuLop as $value) {
    		$lop = new Lop($value["maLop"], $value["tenLop"]);
    		$data[] = $lop;
    	}
    	return $data;
    }

    public function getAllHocVi() {
    	$duLieuHocVi = HocViModel::all();
    	$data = [];
    	foreach ($duLieuHocVi as $value) {
    		$hocVi = new HocVi($value["maHocVi"], $value["tenHocVi"]);
    		$data[] = $hocVi;
    	}
    	return $data;
    }

    public function getAllDonVi() {
    	$duLieuDonVi = DonViThucTapModel::all();
    	$data = [];
    	foreach ($duLieuDonVi as $value) {
    		$donVi = new DonVi($value["maDonVi"], $value["tenDonVi"],$value["diaChiDonVi"], $value["sdtDonVi"], $value["soKM"]);
    		$data[] = $donVi;
    	}
    	return $data;
    }

    public function getAllChucVu() {
    	$duLieuChucVu = ChucVuModel::all();
    	$data = [];
    	foreach ($duLieuChucVu as $value) {
    		$chucVu = new ChucVu($value["maChucVu"], $value["tenChucVu"]);
    		$data[] = $chucVu;
    	}
    	return $data;
    }
}