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
	
    public function home(Request $rq, $id = null, $menu = null) {
    	//lay duoc du lieu cua user này
    	$email = $rq->session()->get('email');
    	$userData = $this->sv->getUser($email);
    	switch ($id) {
    		case '1':
    			$info = "Đăng ký thành công";
    			return view('sinh-vien.quan-tri')->with(compact('userData', "info", 'menu'));
    			break;
    		
    		case '2':
    			$info = "Đăng ký không thành công";
    			return view('sinh-vien.quan-tri')->with(compact('userData', "info", 'menu'));
    			break;
            case '3':
                $info = "Cập nhật thành công";
                return view('sinh-vien.quan-tri')->with(compact('userData', "info", 'menu'));
                break;
            
            case '4':
                $info = "Cập nhật không thành công";
                return view('sinh-vien.quan-tri')->with(compact('userData', "info", 'menu'));
                break;
            case '5':
                $info = "Xóa thành công";
                return view('sinh-vien.quan-tri')->with(compact('userData', "info", 'menu'));
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
    	$soKM = $this->sv->getSoKM($email);


        if($soKM == -1) {
            $soTien = 0;
            $info = "Không có kinh phí hỗ trợ, do bạn chưa đăng ký thực tập";
            return view('sinh-vien.kinh-phi')->with(compact('userData', 'soTien', 'info'));
        }
        else {
            //tinh so tien
            $soTien = $soTienHoTro * $soKM;
            return view('sinh-vien.kinh-phi')->with(compact('userData', 'soTien'));
        }
    }

    //===================================================================

    public function dangKyThucTap(Request $rq) {
    	$donVi = $this->sv->get_don_vi();
    	$trangThaiDangKy = "";
    	$email = $rq->session()->get('email');
    	$user_item = $this->sv->getUser($email);
    	if( $this->sv->trangThaiDangKy( $user_item->getEmail() ) ) {
    		$trangThaiDangKy = 'Đã đăng ký';
    		$thucTap = $this->sv->getThucTap( $user_item->getEmail() );
    		return view('sinh-vien.dang-ky-thuc-tap')->with(compact('trangThaiDangKy','donVi', 'thucTap'));
    	}else {
    		$trangThaiDangKy = 'Chưa đăng ký';
    		return view('sinh-vien.dang-ky-thuc-tap')->with(compact('trangThaiDangKy','donVi'));
    	}
    }

    //===================================================================

    public function xuLyDangKyThucTap(Request $rq) {
    	$email = $rq->session()->get('email');
    	$data = $rq->all();
    	$user_item = $this->sv->getUser($email);
    	$kq = $this->sv->dang_ky_thuc_Tap( $user_item->getEmail(), $data );
    	if($kq)
    		return redirect('sinh-vien/home/1/dang-ky');
    	else return redirect('sinh-vien/home/2/dang-ky');
    }

    //===================================================================

    public function capNhatDangKyThucTap(Request $rq) {
        $email = $rq->session()->get('email');
        $data = $rq->all();
        $kq = $this->sv->cap_nhat_dang_ky( $email, $data );
        if($kq)
            return redirect('sinh-vien/home/3/dang-ky');
        else return redirect('sinh-vien/home/4/dang-ky');
    }

    //===================================================================

    public function xoaDangKyThucTap(Request $rq) {
        $email = $rq->session()->get('email');
        $kq = $this->sv->xoa_dang_ky( $email );
        return redirect('sinh-vien/home/5/dang-ky');
    }

    //===================================================================

    public function xemDiem(Request $rq) {
        $email = $rq->session()->get('email');
        $dataDiem = $this->sv->xem_diem( $email );
        $diemTB = 0;
        if(count($dataDiem) != 0) {
            $soLuong = count($dataDiem);
            $diemTB = 0;
            foreach ($dataDiem as $value) {
                $diemTB += $value->getDiem();
            }
            $diemTB = $diemTB / (float)$soLuong;
        }      
        return view('sinh-vien.diem')->with( compact('dataDiem', 'diemTB') );
    }
}
