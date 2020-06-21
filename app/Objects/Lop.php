<?php
namespace App\Objects;
use App\User;
use App\LopModel;

class Lop {
	protected $maLop;	
	protected $tenLop;
    private $lop_table;

    public function __construct() {
        $this->lop_table = new LopModel();
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
    public function getAllLop() {
        $duLieuLop = $this->lop_table->all();
        $data = [];
        foreach ($duLieuLop as $value) {
            $lop = new Lop();
            $lop->setData($value["maLop"], $value["tenLop"]);
            $data[] = $lop;
        }
        return $data;
    }

}