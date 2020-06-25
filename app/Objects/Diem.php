<?php
namespace App\Objects;

use App\ChamDiemModel;
use App\PhieuChamModel;
use App\Objects\NguoiDung;

use Illuminate\Support\Facades\DB;

class Diem {
  	private $emailSV;
  	private $nguoiCham;
  	private $diem;
  	private $nhanXet;
  	private $chamDiem_table;
    private $phieuCham_table;

	public function __construct() {
    		$this->chamDiem_table = new ChamDiemModel();
    		$this->nguoiCham = new NguoiDung();
        $this->phieuCham_table = new PhieuChamModel();
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
        // $data = $this->chamDiem_table->where('emailSV', '=', $email)->join('phieucham', 'phieucham.maPhieuCham', '=', 'chamdiem.maPhieuCham')->join('users', 'users.email', '=', 'chamdiem.emailNguoiCham')->get();
        $data = DB::table('chamdiem')->where('emailSV', '=', $email)->join('phieucham', 'phieucham.maPhieuCham', '=', 'chamdiem.maPhieuCham')->join('users', 'users.email', '=', 'chamdiem.emailNguoiCham')->get();

        $listDiem = [];
        foreach ($data as $value) {
        	$diem = new Diem();
        	$diem->setEmailSV( $value->emailSV );
        	$diem->setDiem( $value->diem );
        	$diem->setNhanXet( $value->nhanXet ); 
        	$diem->setDataNguoiCham( $value->emailNguoiCham, $value->hoTen );
        	$listDiem[] = $diem;
        }
        return $listDiem;
    }


    //==================================================================
    
    public function getThongTinDiemTheoNguoiCham($emailSV, $emailNHD) {
        // $data = $this->chamDiem_table->where('emailSV', '=', $email)->join('phieucham', 'phieucham.maPhieuCham', '=', 'chamdiem.maPhieuCham')->join('users', 'users.email', '=', 'chamdiem.emailNguoiCham')->get();
        $data = DB::table('chamdiem')->whereRaw('emailSV = ? and emailNguoiCham = ?', [$emailSV, $emailNHD])->join('phieucham', 'phieucham.maPhieuCham', '=', 'chamdiem.maPhieuCham')->join('users', 'users.email', '=', 'chamdiem.emailNguoiCham')->get()->toArray();

        if( count($data) != 0 )
        {
            $diem = new Diem();
            $diem->setEmailSV( $data[0]->emailSV );
            $diem->setDiem( $data[0]->diem );
            $diem->setNhanXet( $data[0]->nhanXet ); 
            $diem->setDataNguoiCham( $data[0]->emailNguoiCham, $data[0]->hoTen ); 
            return $diem;      
        }else {
            $diem = new Diem();
            $diem->setEmailSV( $emailSV );
            $diem->setDiem( "Chưa chấm" );
            $diem->setNhanXet( "Chưa chấm" ); 
            $diem->setDataNguoiCham( $emailNHD, null );
            return $diem;   
        } 
    }

    //==================================================================
    
    public function getNgayKetThucThucTap($emailSV, $emailNHD) {
        // $data = $this->chamDiem_table->where('emailSV', '=', $email)->join('phieucham', 'phieucham.maPhieuCham', '=', 'chamdiem.maPhieuCham')->join('users', 'users.email', '=', 'chamdiem.emailNguoiCham')->get();
        $data = DB::table('chamdiem')->whereRaw('emailSV = ? and emailNguoiCham = ?', [$emailSV, $emailNHD])->get()->toArray();
        if( count($data) != 0 )
        {
            return $data[0]->ngayKetThucThucTap;      
        }else {  
            return "Chưa thiết lập";
        } 
    }

    //===============================================================
    public function cham_diem( $emailSV, $emailNHD, $data, $role ) {
        try {

            $dataDiem = DB::table('chamdiem')->whereRaw('emailSV = ? and emailNguoiCham = ?', [$emailSV, $emailNHD])->get()->toArray();
            if( count($dataDiem) != 0 )
            {
                  $phieucham_item = $this->phieuCham_table->where('maPhieuCham', '=', $dataDiem[0]->maPhieuCham)->first();
                  $phieucham_item->diem = $data["diem"];
                  $phieucham_item->nhanXet = $data["nhan-xet"];
                  $phieucham_item->ngayCham = date("Y-m-d");
                  $phieucham_item->save();    
            }else {  
                  $phieucham_final = $this->phieuCham_table->orderBy('maPhieuCham', 'DESC')->take(1)->get()->toArray(); 
                  $maPhieuCham = (int)$phieucham_final[0]["maPhieuCham"] + 1;

                  $phieucham_item = new PhieuChamModel();
                  $phieucham_item->maPhieuCham = $maPhieuCham;
                  $phieucham_item->diem = $data["diem"];
                  $phieucham_item->nhanXet = $data["nhan-xet"];
                  $phieucham_item->ngayCham = date("Y-m-d");
                  $phieucham_item->save();

                  if( $role == 'nguoi-huong-dan' ) {
                      DB::table('chamdiem')->insert([
                          array('emailSV' => $emailSV,
                                'emailNguoiCham' => $emailNHD,
                                'maPhieuCham' =>  $maPhieuCham,
                                'ngayKetThucThucTap' => $data["ngay-ket-thuc"]
                              )
                      ]);
                  } else {
                      DB::table('chamdiem')->insert([
                          array('emailSV' => $emailSV,
                                'emailNguoiCham' => $emailNHD,
                                'maPhieuCham' =>  $maPhieuCham,
                                'ngayKetThucThucTap' => null
                              )
                      ]);
                  }
          }
          
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }
}