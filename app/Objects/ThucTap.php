<?php
namespace App\Objects;

use App\Objects\SinhVien;
use App\Objects\GiangVien;
use App\Objects\NguoiHuongDan;
use App\Objects\DonVi;
use App\Objects\NguoiDung;
use App\Objects\Diem;
use App\ThucTapModel;


class ThucTap {

	private $sinhVien;
	private $giangVien;
	private $nguoiHuongDan;
	private $donVi;
	private $ngayBatDauThucTap;
    private $ngayKetThucThucTap;
	private $thucTap_table;
    private $diemNguoiHuongDan;
    private $diemGiangVien;


	/**
	 * Class Constructor
	 * @param    $sinhVien   
	 * @param    $giangVien   
	 * @param    $nguoiHuongDan   
	 * @param    $donVi   
	 * @param    $ngayBatDauThucTap   
	 */
	public function __construct()
	{
        $this->sinhVien = new NguoiDung();
        $this->giangVien = new NguoiDung();
        $this->nguoiHuongDan = new NguoiDung();
		$this->donVi = new DonVi();
		$this->thucTap_table = new ThucTapModel();
        $this->diemGiangVien = new Diem();
        $this->diemNguoiHuongDan = new Diem();
	}

    

    /**
     * @return mixed
     */
    public function getNgayBatDauThucTap()
    {
        return $this->ngayBatDauThucTap;
    }

    /**
     * @param mixed $ngayBatDauThucTap
     *
     * @return self
     */
    public function setNgayBatDauThucTap($ngayBatDauThucTap)
    {
        $this->ngayBatDauThucTap = $ngayBatDauThucTap;

        return $this;
    }

        /**
     * @return mixed
     */
    public function getNgayKetThucThucTap()
    {
        return $this->ngayKetThucThucTap;
    }

    /**
     * @param mixed $ngayKetThucThucTap
     *
     * @return self
     */
    public function setNgayKetThucThucTap($ngayKetThucThucTap)
    {
        $this->ngayKetThucThucTap = $ngayKetThucThucTap;

        return $this;
    }

    //==================================================================

    public function setDataDonVi($maDonVi = null, $tenDonVi = null) {
    	if($maDonVi != null) {
    		$this->donVi->setMaDonVi( $maDonVi );
    	}

    	if($tenDonVi != null) {
    		$this->donVi->setTenDonVi( $tenDonVi );
    	}
    }

    //==================================================================

    public function getDataDonVi ( $thuocTinhCanLay ) {
    	switch ($thuocTinhCanLay) {
    		case 'maDonVi':
    			return $this->donVi->getMaDonVi();
    			break;
    		
    		case 'tenDonVi':
    			return $this->donVi->getTenDonVi();
    			break;

    		default:
    			# code...
    			break;
    	}
    }

    //==================================================================

    public function setDataSinhVien($email, $tenSV) {
    	if($email != null) {
    		$this->sinhVien->setEmail( $email );
    	}

    	if($tenSV != null) {
    		$this->sinhVien->setHoTen( $tenSV );
    	}
    }

    //==================================================================

    public function getDataSinhVien ( $thuocTinhCanLay ) {
        switch ($thuocTinhCanLay) {
            case 'email':
                return $this->sinhVien->getEmail();
                break;
            
            case 'ten':
                return $this->sinhVien->getHoTen();
                break;

            default:
                # code...
                break;
        }
    }

    //==================================================================

    public function setDataGiangVien($email, $tenGV) {
        if($email != null) {
            $this->giangVien->setEmail( $email );
        }

        if($tenGV != null) {
            $this->giangVien->setHoTen( $tenGV );
        }
    }

    //==================================================================

    public function getDataGiangVien ( $thuocTinhCanLay ) {
        switch ($thuocTinhCanLay) {
            case 'email':
                # code...
                break;
            
            case 'ten':
                return $this->giangVien->getHoTen();
                break;

            default:
                # code...
                break;
        }
    }


    //==================================================================

    public function setDataNguoiHuongDan($email, $ten) {
        if($email != null) {
            $this->nguoiHuongDan->setEmail( $email );
        }

        if($ten != null) {
            $this->nguoiHuongDan->setHoTen( $ten );
        }
    }

    //==================================================================

    public function getDataNguoiHuongDan ( $thuocTinhCanLay ) {
        switch ($thuocTinhCanLay) {
            case 'email':
                # code...
                break;
            
            case 'ten':
                return $this->nguoiHuongDan->getHoTen();
                break;

            default:
                # code...
                break;
        }
    }

    //==================================================================

    public function getDataDiem ( $thuocTinhCanLay, $role ) {
        if( $role == "nguoi-huong-dan" ) {
            switch ($thuocTinhCanLay) {
                case 'diem':
                    return $this->diemNguoiHuongDan->getDiem();
                    break;
                
                case 'nhanxet':
                    return $this->diemNguoiHuongDan->getNhanXet();
                    break;

                default:
                    # code...
                    break;
            }
        }else if($role == "giang-vien") {
            switch ($thuocTinhCanLay) {
                case 'diem':
                    return $this->diemGiangVien->getDiem();
                    break;
                
                case 'nhanxet':
                    return $this->diemGiangVien->getNhanXet();
                    break;

                default:
                    # code...
                    break;
            }
        }
    }

    //==================================================================

    public function getDanhSachThucTap() {
		$data = $this->thucTap_table->whereRaw('1 = 1')->join('users','users.id', '=', 'thuctap.idSinhVien')->join('donvithuctap', 'donvithuctap.maDonVi', '=','thuctap.maDonVi')->get()->toArray();
		
		$listThucTap = [];
		foreach ($data as $value) {
			$thucTap_item = new ThucTap();

			$listThucTap = $thucTap_item;
		}

		return $listThucTap;
    }

    //=============================================================

    public function getThucTapByEmail( $email ) {
        $data = $this->thucTap_table->whereRaw('emailSV = ?', [$email])->join('users','users.email', '=', 'thuctap.emailSV')->get()->toArray();
        $data_GiangVien = $this->thucTap_table->whereRaw('emailSV = ?', [$email])->join('users','users.email', '=', 'thuctap.emailGV')->get()->toArray();
        $data_NHD = $this->thucTap_table->whereRaw('emailSV = ?', [$email])->join('users','users.email', '=', 'thuctap.emailNHD')->get()->toArray();
        $data_donvi = $this->thucTap_table->whereRaw('emailSV = ?', [$email])->join('donvithuctap', 'donvithuctap.maDonVi', '=','thuctap.maDonVi')->get()->toArray();
       
        $thucTap_item = new ThucTap();
        $thucTap_item->setDataSinhVien( null, $data[0]["hoTen"] );
        
        if( count($data_donvi) != 0 )
            $thucTap_item->setDataDonVi( null, $data_donvi[0]["tenDonVi"] );
        else $thucTap_item->setDataDonVi( null, "Chưa có" );
        
        if( count($data_GiangVien) != 0 )
            $thucTap_item->setDataGiangVien( null, $data_GiangVien[0]["hoTen"] );
        else $thucTap_item->setDataGiangVien( null, "Chưa có" );
        
        if( count($data_NHD) != 0 )
            $thucTap_item->setDataNguoiHuongDan( null, $data_NHD[0]["hoTen"] );
        else $thucTap_item->setDataNguoiHuongDan( null, "Chưa có" );

        return $thucTap_item;
    }

    //==================================================================

    public function get_maDV_by_emailSV( $email ) {
        $data = $this->thucTap_table->where('emailSV', '=', $email)->get();
        if( count($data) != 0 )
            return $data[0]["maDonVi"];
        else return null;
    }

    //==================================================================
    
    public function dang_ky_thuc_tap($email, $data) {
        try { 
            $thucTap = new ThucTapModel();
            $thucTap->emailSV = $email;
            $thucTap->maDonVi = $data["don-vi"];
            $thucTap->save();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
            return false;
        }
    }

    //==================================================================
    
    public function cap_nhat_dang_ky($email, $data) {
        try { 
            $thucTap = $this->thucTap_table->where('emailSV', '=', $email)->first();
            if(isset($data["giang-vien"])) {
                if($data["giang-vien"] == 'NULL')
                    $thucTap->emailGV = null;
                else $thucTap->emailGV = $data["giang-vien"];
            }


            if(isset($data["nguoi-huong-dan"])) {
                if($data["nguoi-huong-dan"] == 'NULL')
                    $thucTap->emailNHD = null;
                else $thucTap->emailNHD = $data["nguoi-huong-dan"];   
            }
            if(isset($data["ngay-bat-dau"])) {
                $thucTap->ngayBatDauThucTap = $data["ngay-bat-dau"];    
            }

            $thucTap->maDonVi = $data["don-vi"];
            $thucTap->save();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
            return false;
        }
    }

    //==================================================================
    
    public function xoa_dang_ky($email) {
        try { 
            $this->thucTap_table->where('emailSV', '=', $email)->delete();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
            return false;
        }
    }

    //=============================================================

    public function getAll(  ) {
        $dataSV = $this->thucTap_table->join('users','users.email', '=', 'thuctap.emailSV')->get()->toArray();

        $listThucTap = [];
        foreach ($dataSV as  $value) {
            $thucTap_item = new ThucTap();
            $thucTap_item->setDataSinhVien( $value["emailSV"], $value["hoTen"] );

            $data_donvi = $this->thucTap_table->where('emailSV', '=', $value["emailSV"])->join('donvithuctap','donvithuctap.maDonVi', '=', 'thuctap.maDonVi')->get()->toArray();          
            $data_GiangVien = $this->thucTap_table->where('emailSV', '=', $value["emailSV"])->join('users','users.email', '=', 'thuctap.emailGV')->get()->toArray();
            $data_NHD = $this->thucTap_table->where('emailSV', '=', $value["emailSV"])->join('users','users.email', '=', 'thuctap.emailNHD')->get()->toArray();
            
            if( count($data_donvi) != 0 )
                $thucTap_item->setDataDonVi( $data_donvi[0]["maDonVi"], $data_donvi[0]["tenDonVi"] );
            else $thucTap_item->setDataDonVi( null, "Chưa có" );
            
            if( count($data_GiangVien) != 0 ) {
                $thucTap_item->setDataGiangVien( $data_GiangVien[0]["emailGV"], $data_GiangVien[0]["hoTen"] );
                $thucTap_item->diemGiangVien = $thucTap_item->diemGiangVien->getThongTinDiemTheoNguoiCham( $value["emailSV"], $data_GiangVien[0]["emailGV"] );
            }
            else $thucTap_item->setDataGiangVien( null, "Chưa có" );
            
            if( count($data_NHD) != 0 ) {
                $thucTap_item->setDataNguoiHuongDan( $data_NHD[0]["emailNHD"], $data_NHD[0]["hoTen"], $data_NHD[0]["maDonVi"] );
                $thucTap_item->setNgayKetThucThucTap( $thucTap_item->diemNguoiHuongDan->getNgayKetThucThucTap( $value["emailSV"], $data_NHD[0]["emailNHD"] ) );
                $thucTap_item->diemNguoiHuongDan = $thucTap_item->diemNguoiHuongDan->getThongTinDiemTheoNguoiCham( $value["emailSV"],  $data_NHD[0]["emailNHD"] );
            }
            else $thucTap_item->setDataNguoiHuongDan( null, "Chưa có" );

            if($value["ngayBatDauThucTap"] == null)
                $thucTap_item->setNgayBatDauThucTap( "Chưa thiết lập" );
            else  $thucTap_item->setNgayBatDauThucTap( $value["ngayBatDauThucTap"] );

            $listThucTap[] = $thucTap_item;
        }
        
        return $listThucTap;
    }

    //=======================================================
    public function getAllThongTinThucTapByEmailNHD( $column, $email, $role ) {
        $dataSV = $this->thucTap_table->where($column, '=', $email)->join('users','users.email', '=', 'thuctap.emailSV')->get()->toArray();

        $listThucTap = [];
        foreach ($dataSV as  $value) {
            $thucTap_item = new ThucTap();
            $thucTap_item->setDataSinhVien( $value["emailSV"], $value["hoTen"] );

            if($role == "nguoi-huong-dan")
                $thucTap_item->diemNguoiHuongDan = $thucTap_item->diemNguoiHuongDan->getThongTinDiemTheoNguoiCham( $value["emailSV"], $email );
            else
                $thucTap_item->diemGiangVien = $thucTap_item->diemGiangVien->getThongTinDiemTheoNguoiCham( $value["emailSV"], $email );

            $thucTap_item->setNgayKetThucThucTap( $thucTap_item->diemNguoiHuongDan->getNgayKetThucThucTap( $value["emailSV"], $email ) );

            if($value["ngayBatDauThucTap"] == null)
                $thucTap_item->setNgayBatDauThucTap( "Chưa thiết lập" );
            else  $thucTap_item->setNgayBatDauThucTap( $value["ngayBatDauThucTap"] );

            $listThucTap[] = $thucTap_item;
        }
        
        return $listThucTap;
    }
    

    //===============================================================
    public function cham_diem( $emailSV, $emailNHD, $data, $role ) {
        return $this->diemNguoiHuongDan->cham_diem( $emailSV, $emailNHD, $data, $role );
    }

    //===============================================================
    public function tinh_diem_trung_binh( ThucTap $tt ) {
        $soLuong = 0;
        $diem = 0;
        if( $tt->getDataDiem( 'diem', 'giang-vien' ) != "Chưa chấm" ) {
            $soLuong++;
            $diem += $tt->getDataDiem( 'diem', 'giang-vien' );
        }

        if( $tt->getDataDiem( 'diem', 'nguoi-huong-dan' ) != "Chưa chấm" ) {
            $soLuong++;
            $diem += $tt->getDataDiem( 'diem', 'nguoi-huong-dan' );
        }

        if($soLuong == 0)
            return 0;
        else return ($diem / (float)$soLuong);
    }

    
}
