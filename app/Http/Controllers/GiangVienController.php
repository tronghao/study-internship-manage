<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects\GiangVien;

class GiangVienController extends Controller
{
    private $nguoiHD;

	/**
	 * Class Constructor
	 * @param    $nguoiHD   
	 */
	public function __construct()
	{
		$this->nguoiHD = new GiangVien();
	}


    public function index( $success = null ) {
    	$email = session('email');
    	$userData = $this->nguoiHD->getUser($email);
        if( $success == null )
    	   return view('giang-vien.quan-tri')->with(compact('userData'));
        else {
            switch ($success) {
                case '1':
                    $info = "Cập nhật điểm thành công";
                    return view('giang-vien.quan-tri')->with(compact('userData', 'info'));
                    break;
                
                case '2':
                    $info = "Cập nhật điểm không thành công";
                    return view('giang-vien.quan-tri')->with(compact('userData', 'info'));
                    break;

                default:
                    # code...
                    break;
            }
        }
    }

    //=======================================================================
    public function thongTinThucTap( ) {
    	$email = session('email');
    	$thongTinThucTap = $this->nguoiHD->thongTinThucTap($email);
        $choPhepChamDiem = $this->nguoiHD->choPhepChamDiem();
    	return view('giang-vien.thong-tin-thuc-tap')->with(compact('thongTinThucTap', 'choPhepChamDiem'));
    }

    //=======================================================================
    public function chamDiem( $emailSV, Request $rq) {
        $data = $rq->all();
        $email = session('email');
        $kq = $this->nguoiHD->cham_diem_thuc_tap($emailSV, $email, $data, 'giang-vien');
        if($kq)
            return redirect("giang-vien/home/1");
        else
            return redirect("giang-vien/home/2");
    }
}
