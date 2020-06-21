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
}