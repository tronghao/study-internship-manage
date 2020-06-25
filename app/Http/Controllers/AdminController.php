<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objects\Admin;
use App\Objects\NguoiDung;

class AdminController extends Controller
{
	private $admin;

	public function __construct() {
		$this->admin = new Admin();
	}

    //=====================================================================

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
                    case '5':
                        $info = "Xóa dữ liệu thành công!";
                        break;
                    case '6':
                        $info = "Xóa dữ liệu không thành công!";
                        break;
                    case '7':
                        $info = "User đã được duyệt!";
                        break;
                    case '8':
                        $info = "Lỗi duyệt User!";
                        break;
        		}

        		return view('admin.quan-tri')->with( compact('menu', 'info') );
        	}
        } 
    }

    //=====================================================================

    public function hienThiThongBao() {
    	$duLieuThongBao = $this->admin->hien_thi_thong_bao();
    	return view('admin.thong-bao')->with(compact('duLieuThongBao'));
    }

    //=====================================================================

    public function themThongBao(Request $rq) {
        $data = $rq->all();
        $fileName = "";
        $fileSize = "";
        if ($rq->hasFile('fileToUpload')) {
            $file = $rq->fileToUpload;

            //Lấy Tên files
            $fileName = $file->getClientOriginalName();

            //Lấy kích cỡ của file đơn vị tính theo bytes
            $fileSize = $file->getSize();
        }

        if($fileName != "" && $fileSize < 10485760)
        {
            $file = $rq->fileToUpload;
            $fileName = url("public/img/upload/".$fileName);
            $file->move("public/img/upload", $file->getClientOriginalName());
            $duLieuThongBao = $this->admin->them_thong_bao($data, $fileName);
            return redirect("admin/home/thongbao/1");
        }
        else
        {
            return redirect("admin/home/thongbao/2");
        }
    }

    //=====================================================================

    public function xoaThongBao($id) {
        $kq = $this->admin->xoa_thong_bao($id);
        if($kq)
            return redirect("admin/home/thongbao/5");
        else
            return redirect("admin/home/thongbao/6");
    }

    //=====================================================================

    public function suaThongBao($id, Request $rq) {
        $data = $rq->all();
        $fileName = "";
        $fileSize = "";
        if ($rq->hasFile('fileToUpload')) {
            $file = $rq->fileToUpload;

            //Lấy Tên files
            $fileName = $file->getClientOriginalName();

            //Lấy kích cỡ của file đơn vị tính theo bytes
            $fileSize = $file->getSize();

            if($fileName != "" && $fileSize < 10485760)
            {
                $file = $rq->fileToUpload;
                $fileName = url("public/img/upload/".$fileName);
                $file->move("public/img/upload", $file->getClientOriginalName());
                $kq = $this->admin->sua_thong_bao($id, $fileName, $data);
                if($kq)
                    return redirect("admin/home/thongbao/3");
                else
                    return redirect("admin/home/thongbao/4");
            }
            else return redirect("admin/home/thongbao/4");
        }
        else {
            $fileName = "giữ lại";
            $kq = $this->admin->sua_thong_bao($id, $fileName, $data);
            if($kq)
                return redirect("admin/home/thongbao/3");
            else
                return redirect("admin/home/thongbao/4");
        }
    }

    //=====================================================================

    public function hienThiKinhPhi() {
    	$duLieuKinhPhi = $this->admin->hien_thi_kinh_phi();
    	return view('admin.kinh-phi')->with(compact('duLieuKinhPhi'));
    }

    //=====================================================================

    public function capNhatKinhPhi(Request $rq) {
    	//xu ly ép kiểu
    	$kp = $rq->soTien;
    	if( $this->admin->cap_nhat_kinh_phi($kp) )
			return redirect("admin/home/kinhphi/3");
		else return redirect("admin/home/kinhphi/4");
    }

    //=====================================================================

    public function hienThiDonVi() {
    	$duLieuDonVi = $this->admin->hien_thi_don_vi();
    	return view('admin.don-vi')->with(compact('duLieuDonVi'));
    }

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
        $danhSachThucTap = $this->admin->get_danh_sach_thuc_tap();
        $danhSachGiangVien = $this->admin->getAllRole( "giảng viên" );
        $danhSachNHD = $this->admin->getAllRole( "người hướng dẫn" );
        $danhSachDonVi = $this->admin->hien_thi_don_vi();
        return view('admin.danh-sach-thuc-tap')->with( compact('danhSachThucTap', 'danhSachGiangVien', 'danhSachNHD', 'danhSachDonVi') );
    }

    //=====================================================================

    public function xoaThucTap( $email ) {
        $kq = $this->admin->xoa_thuc_tap( $email );
        if($kq)
            return redirect("admin/home/danh-sach-thuc-tap/5");
        else
            return redirect("admin/home/danh-sach-thuc-tap/6");
    }

    //=====================================================================

    public function editThucTap( $email, Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->sua_thuc_tap( $email, $data );
        //print_r($data);
        if($kq)
            return redirect("admin/home/danh-sach-thuc-tap/3");
        else
            return redirect("admin/home/danh-sach-thuc-tap/4");
    }

    //=====================================================================

    public function hienThiHocVi(  Request $rq ) {
        $danhSachHocVi = $this->admin->get_all_hoc_vi(  );
        return view('admin.hoc-vi')->with( compact('danhSachHocVi') );
    }

     //=====================================================================

    public function xoaHocVi( $maHV ) {
        $kq = $this->admin->xoa_hoc_vi( $maHV );
        if($kq)
            return redirect("admin/home/hoc-vi/5");
        else
            return redirect("admin/home/hoc-vi/6");
    }

    //=====================================================================

    public function themHocVi( Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->them_hoc_vi( $data );
        if($kq)
            return redirect("admin/home/hoc-vi/1");
        else
            return redirect("admin/home/hoc-vi/2");
    }

    //=====================================================================

    public function suaHocVi( $maHV, Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->sua_hoc_vi( $maHV, $data );
        if($kq)
            return redirect("admin/home/hoc-vi/3");
        else
            return redirect("admin/home/hoc-vi/4");
    }

    //=====================================================================

    public function hienThiNganh(  Request $rq ) {
        $danhSachNganh = $this->admin->get_all_nganh(  );
        return view('admin.nganh')->with( compact('danhSachNganh') );
    }

    //=====================================================================

    public function themNganh( Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->them_nganh( $data );
        if($kq)
            return redirect("admin/home/nganh/1");
        else
            return redirect("admin/home/nganh/2");
    }

    //=====================================================================

    public function xoaNganh( $maNganh ) {
        $kq = $this->admin->xoa_nganh( $maNganh );
        if($kq)
            return redirect("admin/home/nganh/5");
        else
            return redirect("admin/home/nganh/6");
    }

    //=====================================================================

    public function suaNganh( $maNganh, Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->sua_nganh( $maNganh, $data );
        if($kq)
            return redirect("admin/home/nganh/3");
        else
            return redirect("admin/home/nganh/4");
    }

    //=====================================================================

    public function hienThiChucVu(  Request $rq ) {
        $danhSachChucVu = $this->admin->get_all_chuc_vu(  );
        return view('admin.chuc-vu')->with( compact('danhSachChucVu') );
    }

     //=====================================================================

    public function xoaChucVu( $maCV ) {
        $kq = $this->admin->xoa_chuc_vu( $maCV );
        if($kq)
            return redirect("admin/home/chuc-vu/5");
        else
            return redirect("admin/home/chuc-vu/6");
    }

    //=====================================================================

    public function themChucVu( Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->them_chuc_vu( $data );
        if($kq)
            return redirect("admin/home/chuc-vu/1");
        else
            return redirect("admin/home/chuc-vu/2");
    }

    //=====================================================================

    public function suaChucVu( $maCV, Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->sua_chuc_vu( $maCV, $data );
        if($kq)
            return redirect("admin/home/chuc-vu/3");
        else
            return redirect("admin/home/chuc-vu/4");
    }

    //=====================================================================

    public function hienThiLop(  Request $rq ) {
        $danhSachLop = $this->admin->get_all_lop();
        $danhSachNganh = $this->admin->get_all_nganh();
        return view('admin.lop')->with( compact('danhSachLop', 'danhSachNganh') );
    }

     //=====================================================================

    public function xoaLop( $maLop ) {
        $kq = $this->admin->xoa_lop( $maLop );
        if($kq)
            return redirect("admin/home/lop/5");
        else
            return redirect("admin/home/lop/6");
    }

    //=====================================================================

    public function themLop( Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->them_lop( $data );
        if($kq)
            return redirect("admin/home/lop/1");
        else
            return redirect("admin/home/lop/2");
    }

    //=====================================================================

    public function suaLop( $maLop, Request $rq ) {
        $data = $rq->all();
        $kq = $this->admin->sua_lop( $maLop, $data );
        if($kq)
            return redirect("admin/home/lop/3");
        else
            return redirect("admin/home/lop/4");
    }

    //=====================================================================

    public function xuatDuLieuThucTap() {
        $this->admin->xuat_du_lieu_thuc_tap();
        return redirect('admin/home');
    }
}
