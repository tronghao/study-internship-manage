<?php
namespace App\Objects;
use App\User;
use App\HocViModel;

class HocVi {
	protected $maHocVi;	
	protected $tenHocVi;
    private $hocvi_table;

    public function __construct() {
        $this->hocvi_table = new HocViModel();
    }

    //================================================================

    public function setData($maHocVi, $tenHocVi)
    {
        $this->maHocVi = $maHocVi;
        $this->tenHocVi = $tenHocVi;
    }


    /**
     * @return mixed
     */
    public function getMaHocVi()
    {
        return $this->maHocVi;
    }

    /**
     * @param mixed $maHocVi
     *
     * @return self
     */
    public function setMaHocVi($maHocVi)
    {
        $this->maHocVi = $maHocVi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTenHocVi()
    {
        return $this->tenHocVi;
    }

    /**
     * @param mixed $tenHocVi
     *
     * @return self
     */
    public function setTenHocVi($tenHocVi)
    {
        $this->tenHocVi = $tenHocVi;

        return $this;
    }


    public function getAll() {
        $duLieuHocVi = $this->hocvi_table->all();
        $data = [];
        foreach ($duLieuHocVi as $value) {
            $hocVi = new HocVi();
            $hocVi->setData($value["maHocVi"], $value["tenHocVi"]);
            $data[] = $hocVi;
        }
        return $data;
    }

    public function xoa_hoc_vi( $maHV ) {
       try { 
          $this->hocvi_table->where('maHocVi', '=', $maHV)->delete();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function them_hoc_vi( $data ) {
       try { 
          $HocVi_final = $this->hocvi_table->orderBy('maHocVi', 'DESC')->take(1)->get()->toArray(); 
          $chuoi = explode("V", $HocVi_final[0]["maHocVi"]);
          $thuTu = (int)$chuoi[1] + 1;
          $maHocVi = "HV".$thuTu;

          $hocvi_item = new HocViModel();
          $hocvi_item->maHocVi = $maHocVi;
          $hocvi_item->tenHocVi = $data["ten-hoc-vi"];
          $hocvi_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function sua_hoc_vi( $maHV, $data ) {
       try { 
          $hocvi_item = $this->hocvi_table->where('maHocVi', '=', $maHV)->first();
          $hocvi_item->tenHocVi = $data["ten-hoc-vi"];
          $hocvi_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }
}