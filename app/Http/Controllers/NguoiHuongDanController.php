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
    	$nguoiHuongDan = $this->nguoiHD->getUserByEmail($email);
    	return view('nguoi-huong-dan.quan-tri')->with(compact('nguoiHuongDan'));
    }
}
