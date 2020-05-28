<?php
namespace App\Objects;
use App\User;

class ChucVu {
	protected $maChucVu;	
	protected $tenChucVu;


    /**
     * Class Constructor
     * @param    $maChucVu   
     * @param    $tenChucVu   
     */
    public function __construct($maChucVu, $tenChucVu)
    {
        $this->maChucVu = $maChucVu;
        $this->tenChucVu = $tenChucVu;
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
}