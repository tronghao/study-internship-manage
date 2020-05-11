<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongBaoModel;

class GuestController extends Controller
{
	private $thongbao_table;
    
	public function __construct() {
		$this->thongbao_table = new ThongBaoModel();
	}

	public function get_3_thong_bao_trang_chu() {
		$data = $this->thongbao_table->all()->take(1);
		return $data;
    }

    public function index() {
    	//$data = $this->get_3_thong_bao_trang_chu(); 
    	return view('guest/trang-chu');
    }
}


?>