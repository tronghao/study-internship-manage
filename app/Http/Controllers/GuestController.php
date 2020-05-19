<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongBaoModel;
use Auth;
use App\Http\Controllers\GoogleController;
use App\Objects\Khach;

class GuestController extends Controller
{
	private $thongbao_table;
    private $khach;
    
	public function __construct() {
		$this->thongbao_table = new ThongBaoModel();
        $this->khach = new Khach();
	}

    public function index() {
    	$listThongBao = $this->khach->get_3_thong_bao();

        $google = new GoogleController();
        $loginURL = $google->getLoginURL(); 
    	return view('guest.trang-chu')->with(compact('loginURL', 'listThongBao'));
    }

    public function handleLoginAfter() {
        
    	if (Auth::check()) {
    		 return view('admin.quan-tri');
		}
    	return redirect('');
    }

    public function handleGoogleLoginAfter($userData, Request $rq) {
        $email = "abc@gmail.com";

        //$email = $userData["email"];
        //kiem tra co ton tai user
        ////if ton tai -> da dang nhap r
        /////  if TrangThai cho duyet
            //      Thong Bao cho duyet - khong cho login vao
            //  if TrangThai da duyet
            //      Cho phep login vao
            //  if TrangThai disable
            //      Thong bao an va chi co quyen xem lai ket qua
            // 
        //if chua -> dang nhap lan dau
            //  co phai la email cua truong dai hoc tra vinh hay khong
            //  yes
            //      if co phai la sinh vien hay k
            //      yes
            //          cho nhap cac thong tin can thiet cua sinh vien
            //      no
            //          cho nhap cac thong tin can thiet cua giang vien
            //  no
            //      cho nhap cac thong tin can thiet cua can bo don vi

        if( $this->khach->ton_tai_user($email) ) {
            //  if TrangThai cho duyet
            //      Thong Bao cho duyet - khong cho login vao
            //  if TrangThai da duyet
            //      Cho phep login vao
            //  if TrangThai disable
            //      Thong bao an va chi co quyen xem lai ket qua
            // 
        }else {
            //  co phai la email cua truong dai hoc tra vinh hay khong
            $kyHieuGmailSinhVienTVU = "@sv.tvu.edu.vn";
            $kyHieuGmailGiangVienTVU = "@tvu.edu.vn";

            if( strpos($email, $kyHieuGmailSinhVienTVU) ) {
                //$rq->session()->put('user-role', 'sinhvien');
                return view('guest.nhap-thong-tin-sinh-vien');
            }
            else if( strpos($email, $kyHieuGmailGiangVienTVU) ) {
                //$rq->session()->put('user-role', 'giangvien');
                return view('guest.nhap-thong-tin-giang-vien');
            }
            else {
                //$rq->session()->put('user-role', 'nguoihuongdan');
                return view('guest.nhap-thong-tin-nguoi-huong-dan');
            }
        }
    }
}


?>