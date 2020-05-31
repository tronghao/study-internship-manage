<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects\Admin;

class AdminController extends Controller
{
	private $admin;

	public function __construct() {
		$this->admin = new Admin();
	}

	public function home($menu = null, $success = null) {
        if($menu == null)
    	    return view('admin.quan-tri');
        else {
        	if($success == null)
        		return view('admin.quan-tri')->with( compact('menu') );
        	else{
        		$info = "";
        		switch ($success) {
        			case '1':
        				$info = "Thêm dữ liệu thành công!";
        				break;
        			case '2':
        				$info = "Thêm dữ liệu không thành công!";
        				break;
        			case '3':
        				$info = "Cập nhật dữ liệu thành công!";
        				break;
        			case '4':
        				$info = "Cập nhật dữ liệu không thành công!";
        				break;
        			default:
        				$info = "Xóa dữ liệu không thành công!";
        				break;
        		}

        		return view('admin.quan-tri')->with( compact('menu', 'info') );
        	}
        } 
    }

    public function hienThiThongBao() {
    	$duLieuThongBao = $this->admin->hien_thi_thong_bao();
    	return view('admin.thong-bao')->with(compact('duLieuThongBao'));
    }

    public function hienThiKinhPhi() {
    	$duLieuKinhPhi = $this->admin->hien_thi_kinh_phi();
    	return view('admin.kinh-phi')->with(compact('duLieuKinhPhi'));
    }

    public function capNhatKinhPhi(Request $rq) {
    	//xu ly ép kiểu
    	$kp = $rq->soTien;
    	if( $this->admin->cap_nhat_kinh_phi($kp) )
			return redirect("admin/home/kinhphi/3");
		else return redirect("admin/home/kinhphi/4");
    }

    public function hienThiDonVi() {
    	$duLieuDonVi = $this->admin->hien_thi_don_vi();
    	return view('admin.don-vi')->with(compact('duLieuDonVi'));
    }
}
