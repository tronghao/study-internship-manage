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
<<<<<<< HEAD
<<<<<<< HEAD

    //=====================================================================

    public function xoaDonVi($maDV) {
        $kq = $this->admin->xoa_don_vi($maDV);
        if($kq)
            return redirect("admin/home/don-vi/5");
        else
            return redirect("admin/home/don-vi/6");
    }

    //=====================================================================

    public function themDonVi(Request $rq) {
        $data = $rq->all();
        $kq = $this->admin->them_don_vi($data);
        if($kq)
            return redirect("admin/home/don-vi/1");
        else
            return redirect("admin/home/don-vi/2");
    }

    //=====================================================================

    public function suaDonVi($maDV, Request $rq) {
        $data = $rq->all();
        $kq = $this->admin->sua_don_vi($maDV, $data);
        if($kq)
            return redirect("admin/home/don-vi/3");
        else
            return redirect("admin/home/don-vi/4");
    }

    //=====================================================================

    public function danhSachUser() {
        $danhsachUser = $this->admin->danh_sach_user();
        return view('admin.danh-sach-user')->with(compact('danhsachUser'));
    }

    //=====================================================================
    
    public function xoaUser($id) {
        $kq = $this->admin->xoa_user($id);
        if($kq)
            return redirect("admin/home/duyet-user/5");
        else
            return redirect("admin/home/duyet-user/6");
    }

    //=====================================================================

    public function duyetUser($email) {
        if( $this->admin->duyet_user($email) )
            return redirect("admin/home/duyet-user/7");
        else return redirect("admin/home/duyet-user/8");
    }

    //=====================================================================

    public function suaUser($id, Request $rq) {
        $data = $rq->all();
        if( $this->admin->sua_user($id, $data) )
            return redirect("admin/home/duyet-user/3");
        else return redirect("admin/home/duyet-user/4");
    }

    //=====================================================================

    public function danhSachThucTap() {
        $danhSachThucTap = "";
        return view();
    }
=======
>>>>>>> parent of 7c607f6... update 17_06_20
=======
>>>>>>> parent of 7c607f6... update 17_06_20
}
