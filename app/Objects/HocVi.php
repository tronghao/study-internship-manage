<?php
namespace App\Objects;
use App\User;

class HocVi {
	protected $maHocVi;	
	protected $tenHocVi;


    /**
     * Class Constructor
     * @param    $maHocVi   
     * @param    $tenHocVi   
     */
    public function __construct($maHocVi, $tenHocVi)
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
}