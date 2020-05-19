<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\Objects\ThongBao;
use App\ThongBaoModel;


class Khach extends NguoiDung {
	private $thongbao_table;

	public function __construct() {
		parent::__construct();
		$this->thongbao_table = new ThongBaoModel();
	}

	public function get_3_thong_bao() {
		$data = $this->thongbao_table->all()->take(3);
		$listThongBao = [];
		foreach ($data as $value) {
			$tb = new ThongBao($value["id"], $value["img"], $value["title"], $value["content"], $value["quote"]);

			$listThongBao[] = $tb;
		}
		return $listThongBao;
	}

	public function kiem_tra_ton_tai() {

	}

	public function them_du_lieu_dang_ky() {

	}

}