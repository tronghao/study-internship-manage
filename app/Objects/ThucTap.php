<?php
namespace App\Objects;

use App\Objects\SinhVien;
use App\Objects\GiangVien;
use App\Objects\NguoiHuongDan;
use App\Objects\DonVi;
use App\Objects\ThucTapModel;

class ThucTap {

	private $sinhVien;
	private $giangVien;
	private $nguoiHuongDan;
	private $donVi;
	private $ngayBatDauThucTap;
	private $thucTap_table;


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
		$this->sinhVien = new SinhVien();
		$this->giangVien = new GiangVien();
		$this->nguoiHuongDan = new NguoiHuongDan();
		$this->donVi = new DonVi();
		$this->thucTap_table = new ThucTapModel();
	}

    

    /**
     * @return mixed
     */
    public function getNgayBatDauThucTap()
    {
        return $this->ngayBatDauThucTap;
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
    			# code...
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

    public function setDataSinhVien($maSV, $tenSV) {
    	if($maDonVi != null) {
    		$this->donVi->setMaDonVi( $maDonVi );
    	}

    	if($tenDonVi != null) {
    		$this->donVi->setTenDonVi( $tenDonVi );
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

    public function get_maDV_by_emailSV( $email ) {
        $data = $this->thucTap_table->where('emailSV', '=', $email)->get;
        if( count($data) != 0 )
            return $data[0]["maDonVi"];
        else return null;
    }
}
