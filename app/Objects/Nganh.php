<?php
namespace App\Objects;
use App\User;
use App\NganhModel;

class Nganh {
	  protected $maNganh;	
	  protected $tenNganh;
    private $nganh_table;

    public function __construct() {
        $this->nganh_table = new NganhModel();
    }

    //================================================================

    public function setData($maNganh, $tenNganh)
    {
        $this->maNganh = $maNganh;
        $this->tenNganh = $tenNganh;
    }

        /**
     * @return mixed
     */
    public function getMaNganh()
    {
        return $this->maNganh;
    }

    /**
     * @param mixed $maNganh
     *
     * @return self
     */
    public function setMaNganh($maNganh)
    {
        $this->maNganh = $maNganh;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTenNganh()
    {
        return $this->tenNganh;
    }

    /**
     * @param mixed $tenNganh
     *
     * @return self
     */
    public function setTenNganh($tenNganh)
    {
        $this->tenNganh = $tenNganh;

        return $this;
    }
    


    public function getAll() {
        $duLieuNganh = $this->nganh_table->all();
        $data = [];
        foreach ($duLieuNganh as $value) {
            $nganh = new Nganh();
            $nganh->setData($value["maNganh"], $value["tenNganh"]);
            $data[] = $nganh;
        }
        return $data;
    }


    public function them_nganh( $data ) {
       try { 
          $nganh_item = new NganhModel();
          $nganh_item->maNganh = $data["ma-nganh"];
          $nganh_item->tenNganh = $data["ten-nganh"];
          $nganh_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function sua_nganh( $maNganh, $data ) {
       try { 
          $nganh_item = $this->nganh_table->where('maNganh', '=', $maNganh)->first();
          $nganh_item->maNganh = $data["ma-nganh"];
          $nganh_item->tenNganh = $data["ten-nganh"];
          $nganh_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function xoa_nganh( $maNganh ) {
       try { 
          $this->nganh_table->where('maNganh', '=', $maNganh)->delete();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }
}