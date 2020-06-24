<?php
namespace App\Objects;
use App\User;
use App\LopModel;
use App\Objects\Nganh;

class Lop {
	protected $maLop;	
	protected $tenLop;
    private $nganh;
    private $lop_table;

    public function __construct() {
        $this->lop_table = new LopModel();
        $this->nganh = new Nganh();
    }

    //=============================================================

    /**
     * @return mixed
     */
    public function getMaLop()
    {
        return $this->maLop;
    }

    //=============================================================

    /**
     * @param mixed $maLop
     *
     * @return self
     */
    public function setMaLop($maLop)
    {
        $this->maLop = $maLop;

        return $this;
    }

    //=============================================================

    /**
     * @return mixed
     */
    public function getTenLop()
    {
        return $this->tenLop;
    }

    //=============================================================
    /**
     * @param mixed $tenLop
     *
     * @return self
     */
    public function setTenLop($tenLop)
    {
        $this->tenLop = $tenLop;

        return $this;
    }

    //=============================================================

    public function setData($maLop, $tenLop)
    {
        $this->maLop = $maLop;
        $this->tenLop = $tenLop;
    }

    //=============================================================

    public function setDataNganh($maNganh, $tenNganh)
    {
        $this->nganh->setMaNganh( $maNganh );
        $this->nganh->setTenNganh( $tenNganh );
    }

    //=============================================================

    public function getDataNganh($thuocTinhCanLay)
    {
        switch ($thuocTinhCanLay) {
            case 'ma':
                return $this->nganh->getMaNganh();
                break;
            
            case 'ten':
                return $this->nganh->getTenNganh();
                break;
            default:
                # code...
                break;
        }
    }

    //=============================================================
    public function getAllLop() {
        $duLieuLop = $this->lop_table->join('nganh', 'nganh.maNganh', '=', 'lop.maNganh')->get()->toArray();
        $data = [];
        foreach ($duLieuLop as $value) {
            $lop = new Lop();
            $lop->setData($value["maLop"], $value["tenLop"]);
            $lop->setDataNganh( $value["maNganh"], $value["tenNganh"] );
            $data[] = $lop;
        }
        return $data;
    }

    public function xoa_lop( $maLop ) {
       try { 
          $this->lop_table->where('maLop', '=', $maLop)->delete();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }
}