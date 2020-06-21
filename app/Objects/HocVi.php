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
}