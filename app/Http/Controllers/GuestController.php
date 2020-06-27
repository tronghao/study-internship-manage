<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongBaoModel;
use Auth;
use App\Http\Controllers\GoogleController;
use App\Objects\Khach;
use App\Objects\NguoiDung;
use App\Objects\GiangVien;
use App\Objects\SinhVien;
use App\Objects\NguoiHuongDan;

class GuestController extends Controller
{
	private $thongbao_table;
    private $khach;
    private $google;
    private $nguoiDung;
    private $sinhVien;
    private $giangVien;
    private $canBo;
    
	public function __construct() {
		$this->thongbao_table = new ThongBaoModel();
        $this->khach = new Khach();
        $this->google = new GoogleController();
        $this->nguoiDung = new NguoiDung();
        $this->sinhVien = new SinhVien();
        $this->giangVien = new GiangVien();
        $this->canBo = new NguoiHuongDan();
	}

    public function index() {
    	$listThongBao = $this->khach->get_3_thong_bao();

        $loginURL = $this->google->getLoginURL(); 

    	return view('guest.trang-chu')->with(compact('loginURL', 'listThongBao'));
    }

    public function index2($id) {
        $listThongBao = $this->khach->get_3_thong_bao();

        $loginURL = $this->google->getLoginURL(); 

        if($id == 1) {
            $info = "Tài khoản chưa được cấp quyền. Bạn cần chờ admin duyệt!";
            return view("guest.trang-chu")->with( compact('info', 'listThongBao', 'loginURL') );
        }
        else {
            $info = "Đã cập nhật thông tin";
            return view("guest.trang-chu")->with( compact('info', 'listThongBao', 'loginURL') );
        }
        
    }

    public function hienThiThongBao($id) {
        $thongBaoItem = $this->khach->get_1_thong_bao($id);
        $loginURL = $this->google->getLoginURL(); 
        return view('guest.thong-bao')->with(compact('thongBaoItem', 'loginURL'));
    }

    public function logout(Request $request) {
        $request->session()->forget('access_token');
        $this->google->logout(); 
        $request->session()->flush();
        return redirect('');
    }

    public function handleGoogleLoginAfter($userData) {
        $email = $userData["email"];
        $email = "stucorp@tvu.edu.vn";
        $hoTen = $userData["givenName"]." ".$userData["familyName"];
        $anhDaiDien = $userData["picture"];
        $trangThai = "chờ duyệt";

        $kyHieuGmailSinhVienTVU = "@sv.tvu.edu.vn";
        $kyHieuGmailGiangVienTVU = "@tvu.edu.vn";

        /*
        kiem tra co ton tai user
        if ton tai -> da dang nhap r
          if TrangThai cho duyet
                 Thong Bao cho duyet - khong cho login vao
             if TrangThai da duyet
                 Cho phep login vao
             if TrangThai disable
                 Thong bao an va chi co quyen xem lai ket qua
            
        if chua -> dang nhap lan dau
             co phai la email cua truong dai hoc tra vinh hay khong
             yes
                 if co phai la sinh vien hay k
                 yes
                     cho nhap cac thong tin can thiet cua sinh vien
                 no
                     cho nhap cac thong tin can thiet cua giang vien
             no
                 cho nhap cac thong tin can thiet cua can bo don vi
        */
        if( $this->khach->ton_tai_user( $email ) ) {
            $thanhVien = new Khach();
            $thanhVien = $this->khach->getUserByEmail($email);
            if( $thanhVien->getTrangThai() == "chờ duyệt" ) {
                if( strpos($email, $kyHieuGmailSinhVienTVU) ) {
                    if($this->sinhVien->ton_tai($email)) {
                        return "chờ duyệt";
                    }
                    else return "guest.nhap-thong-tin-sinh-vien";
                }
                else if( strpos($email, $kyHieuGmailGiangVienTVU) ) {
                    if($this->giangVien->ton_tai($email)) {
                        return "chờ duyệt";
                    }
                    else return "guest.nhap-thong-tin-giang-vien";
                }
                else {
                    if($this->canBo->ton_tai($email)) {
                        return "chờ duyệt";
                    }
                    else return "guest.nhap-thong-tin-nguoi-huong-dan";
                }
            }
            else if( $thanhVien->getTrangThai() == "đã duyệt" ) {
                if( strpos($email, $kyHieuGmailSinhVienTVU) ) {
                    session(['email' => $email]);
                    session(['role' => 'sinhvien']);
                    return "sinh-vien.quan-tri";
                }
                else if( strpos($email, $kyHieuGmailGiangVienTVU) ) {
                    session(['email' => $email]);
                    session(['role' => 'giangvien']);
                    return "giang-vien.quan-tri";
                }
                else {
                    session(['email' => $email]);
                    session(['role' => 'nguoihuongdan']);
                    return "nguoi-huong-dan/home";
                }
            }
        }else {
            //  co phai la email cua truong dai hoc tra vinh hay khong
            if( strpos($email, $kyHieuGmailSinhVienTVU) ) {
                $loaiUser = "sinh viên";
                $this->khach->luu_user( $hoTen, $email, $trangThai, $anhDaiDien, $loaiUser );
                //$rq->session()->put('user-role', 'sinhvien');
                return "guest.nhap-thong-tin-sinh-vien";
            }
            else if( strpos($email, $kyHieuGmailGiangVienTVU) ) {
                $loaiUser = "giảng viên";
                $this->khach->luu_user( $hoTen, $email, $trangThai, $anhDaiDien, $loaiUser );
                //$rq->session()->put('user-role', 'giangvien');
                return "guest.nhap-thong-tin-giang-vien";
            }
            else {
                $loaiUser = "người hướng dẫn";
                $this->khach->luu_user( $hoTen, $email, $trangThai, $anhDaiDien, $loaiUser );
                //$rq->session()->put('user-role', 'nguoihuongdan');
                return "guest.nhap-thong-tin-nguoi-huong-dan";
            }
        }
    }

    public function insertSinhVien(Request $rq, $email) {
        $data = $rq->all();
        $this->khach->cap_nhat_thong_tin($data, "sinhvien", $email);
        return redirect("home/2");
    }

    public function insertGiangVien(Request $rq, $email) {
        $data = $rq->all();
        $this->khach->cap_nhat_thong_tin($data, "giangvien", $email);
        return redirect("home/2");
    }

    public function insertCanBo(Request $rq, $email) {
        $data = $rq->all();
        $this->khach->cap_nhat_thong_tin($data, "canbo", $email);
        return redirect("home/2");
    }
}


?>