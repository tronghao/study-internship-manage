<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects\SinhVien;

class SinhVienController extends Controller
{
	private $sv;


	/**
	 * Class Constructor
	 * @param    $sv   
	 */
	public function __construct()
	{
		$this->sv = new SinhVien();
	}

	//===================================================================
	
    public function home(Request $rq, $id = null) {
    	//lay duoc du lieu cua user này
    	$email = $rq->session()->get('email');
    	$userData = $this->sv->getUser($email);
    	switch ($id) {
    		case '1':
    			$info = "Đăng ký thành công";
    			return view('sinh-vien.quan-tri')->with(compact('userData', "info"));
    			break;
    		
    		case '2':
    			$info = "Đăng ký không thành công";
    			return view('sinh-vien.quan-tri')->with(compact('userData', "info"));
    			break;
    		default:
    			return view('sinh-vien.quan-tri')->with(compact('userData'));
    			break;
    	}
    }

    //===================================================================
	
    public function xemKinhPhi(Request $rq) {
    	//lay duoc du lieu kinh phi
    	$email = $rq->session()->get('email');
    	$userData = $this->sv->getUser($email);
    	
    	$soTienHoTro = $this->sv->getKinhPhiHoTro();
    	$soKM = $this->sv->getSoKM($email);;
    	//tinh so tien
    	$soTien = $soTienHoTro * $soKM;
    	return view('sinh-vien.kinh-phi')->with(compact('userData', 'soTien'));
    }

    public function dangKyThucTap(Request $rq) {
    	$donVi = $this->sv->get_don_vi();
    	$trangThaiDangKy = "";
    	$email = $rq->session()->get('email');
    	$user_item = $this->sv->getUser($email);
    	if( $this->sv->trangThaiDangKy( $user_item->getId() ) ) {
    		$trangThaiDangKy = 'Đã đăng ký';
    		$thucTap = $this->sv->getThucTap( $user_item->getId() );
    		return view('sinh-vien.dang-ky-thuc-tap')->with(compact('trangThaiDangKy','donVi', 'thucTap'));
    	}else {
    		$trangThaiDangKy = 'Chưa đăng ký';
    		return view('sinh-vien.dang-ky-thuc-tap')->with(compact('trangThaiDangKy','donVi'));
    	}
    }

    public function xuLyDangKyThucTap(Request $rq) {
    	$email = $rq->session()->get('email');
    	$data = $rq->all();
    	$user_item = $this->sv->getUser($email);
    	$kq = $this->sv->dang_ky_thuc_Tap( $user_item->getId(), $data );
    	if($kq)
    		return redirect('sinh-vien/home/1');
    	else return redirect('sinh-vien/home/2');
    }
}
