<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects\NguoiHuongDan;

class NguoiHuongDanController extends Controller
{
	private $nguoiHD;

	/**
	 * Class Constructor
	 * @param    $nguoiHD   
	 */
	public function __construct()
	{
		$this->nguoiHD = new NguoiHuongDan();
	}


    public function index() {
    	$email = session('email');
    	$userData = $this->nguoiHD->getUser($email);
    	return view('nguoi-huong-dan.quan-tri')->with(compact('userData'));
    }

    //=======================================================================
    public function thongTinThucTap( ) {
    	$email = session('email');
    	$thongTinThucTap = $this->nguoiHD->thongTinThucTap($email);
    	return view('nguoi-huong-dan.thong-tin-thuc-tap')->with(compact('thongTinThucTap'));
    }
}
