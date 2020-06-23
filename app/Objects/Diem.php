<?php
namespace App\Objects;

use App\ChamDiemModel;
use App\Objects\NguoiDung;

class Diem {
	private $emailSV;
	private $nguoiCham;
	private $diem;
	private $nhanXet;
	private $chamDiem_table;

	public function __construct() {
		$this->chamDiem_table = new ChamDiemModel();
		$this->nguoiCham = new NguoiDung();
	}

    /**
     * @return mixed
     */
    public function getEmailSV()
    {
        return $this->emailSV;
    }

    /**
     * @return mixed
     */
    public function getDiem()
    {
        return $this->diem;
    }

    /**
     * @return mixed
     */
    public function getNhanXet()
    {
        return $this->nhanXet;
    }

       /**
     * @param mixed $nhanXet
     *
     * @return self
     */
    public function setNhanXet($nhanXet)
    {
        $this->nhanXet = $nhanXet;

        return $this;
    }

     /**
     * @param mixed $emailSV
     *
     * @return self
     */
    public function setEmailSV($emailSV)
    {
        $this->emailSV = $emailSV;

        return $this;
    }

    /**
     * @param mixed $diem
     *
     * @return self
     */
    public function setDiem($diem)
    {
        $this->diem = $diem;

        return $this;
    }

    //=========================================================
    
    public function setDataNguoiCham($email, $ten) {
    	if($email != null) {
            $this->nguoiCham->setEmail( $email );
        }

        if($ten != null) {
            $this->nguoiCham->setHoTen( $ten );
        }
    }

    //==================================================================

    public function getDataNguoiCham ( $thuocTinhCanLay ) {
        switch ($thuocTinhCanLay) {
            case 'email':
                # code...
                break;
            
            case 'ten':
                return $this->nguoiCham->getHoTen();
                break;

            default:
                # code...
                break;
        }
    }

    //==================================================================
    
    public function getThongTinDiem($email) {
        $data = $this->chamDiem_table->where('emailSV', '=', $email)->join('phieucham', 'phieucham.maPhieuCham', '=', 'chamdiem.maPhieuCham')->join('users', 'users.email', '=', 'chamdiem.emailNguoiCham')->get();
        
        $listDiem = [];
        foreach ($data as $value) {

	        echo $value["emailSV"];


        	// $diem = new Diem();
        	// $diem->setEmailSV( $value["emailSV"] );
        	// $diem->setDiem( $value["diem"] );
        	// $diem->setNhanXet( $value["nhanXet"] ); 
        	// $diem->setDataNguoiCham( $value["emailNguoiCham"], $value["hoTen"] );
        	// $listDiem[] = $diem;
        }
        return $listDiem1;
    }


 

   
}