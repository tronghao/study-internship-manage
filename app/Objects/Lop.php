<?php
namespace App\Objects;
use App\User;

class Lop {
	protected $maLop;	
	protected $tenLop;


    /**
     * Class Constructor
     * @param    $maLop   
     * @param    $tenLop   
     */
    public function __construct($maLop, $tenLop)
    {
        $this->maLop = $maLop;
        $this->tenLop = $tenLop;
    }
	


    /**
     * @return mixed
     */
    public function getMaLop()
    {
        return $this->maLop;
    }

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

    /**
     * @return mixed
     */
    public function getTenLop()
    {
        return $this->tenLop;
    }

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
}