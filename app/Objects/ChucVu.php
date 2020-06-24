<?php
namespace App\Objects;
use App\User;
use App\ChucVuModel;

class ChucVu {
	protected $maChucVu;	
	protected $tenChucVu;
    private $chucvu_table;


    public function __construct() {
        $this->chucvu_table = new ChucVuModel();
    }
   

    /**
     * @return mixed
     */
    public function getMaChucVu()
    {
        return $this->maChucVu;
    }

    /**
     * @param mixed $maChucVu
     *
     * @return self
     */
    public function setMaChucVu($maChucVu)
    {
        $this->maChucVu = $maChucVu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTenChucVu()
    {
        return $this->tenChucVu;
    }

    /**
     * @param mixed $tenChucVu
     *
     * @return self
     */
    public function setTenChucVu($tenChucVu)
    {
        $this->tenChucVu = $tenChucVu;

        return $this;
    }


    //================================================================
        
    public function setData($maChucVu, $tenChucVu)
    {
        $this->maChucVu = $maChucVu;
        $this->tenChucVu = $tenChucVu;
    }

    //================================================================
    
    public function getAll() {
        $duLieuChucVu = $this->chucvu_table->all();
        $data = [];
        foreach ($duLieuChucVu as $value) {
            $chucVu = new ChucVu();
            $chucVu->setData($value["maChucVu"], $value["tenChucVu"]);
            $data[] = $chucVu;
        }
        return $data;
    }

    public function xoa_chuc_vu( $maCV ) {
       try { 
          $this->chucvu_table->where('maChucVu', '=', $maCV)->delete();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }


    public function them_chuc_vu( $data ) {
       try { 
          $ChucVu_final = $this->chucvu_table->orderBy('maChucVu', 'DESC')->take(1)->get()->toArray(); 
          $chuoi = explode("V", $ChucVu_final[0]["maChucVu"]);
          $thuTu = (int)$chuoi[1] + 1;
          $maChucVu = "CV".$thuTu;

          $chucvu_item = new ChucVuModel();
          $chucvu_item->maChucVu = $maChucVu;
          $chucvu_item->tenChucVu = $data["ten-chuc-vu"];
          $chucvu_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function sua_chuc_vu( $maCV, $data ) {
       try { 
          $chucvu_item = $this->chucvu_table->where('maChucVu', '=', $maCV)->first();
          $chucvu_item->tenChucVu = $data["ten-chuc-vu"];
          $chucvu_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }
}