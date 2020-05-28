<?php
namespace App\Objects;
use App\User;

class DonVi {
	protected $maDonVi;	
	protected $tenDonVi;
    protected $diaChiDonVi;
    protected $sdtDonVi;
    protected $soKM;


    /**
     * Class Constructor
     * @param    $maDonVi   
     * @param    $tenDonVi   
     * @param    $diaChiDonVi   
     * @param    $sdtDonVi   
     * @param    $soKM   
     */
    public function __construct($maDonVi, $tenDonVi, $diaChiDonVi, $sdtDonVi, $soKM)
    {
        $this->maDonVi = $maDonVi;
        $this->tenDonVi = $tenDonVi;
        $this->diaChiDonVi = $diaChiDonVi;
        $this->sdtDonVi = $sdtDonVi;
        $this->soKM = $soKM;
    }


    /**
     * @return mixed
     */
    public function getMaDonVi()
    {
        return $this->maDonVi;
    }

    /**
     * @param mixed $maDonVi
     *
     * @return self
     */
    public function setMaDonVi($maDonVi)
    {
        $this->maDonVi = $maDonVi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTenDonVi()
    {
        return $this->tenDonVi;
    }

    /**
     * @param mixed $tenDonVi
     *
     * @return self
     */
    public function setTenDonVi($tenDonVi)
    {
        $this->tenDonVi = $tenDonVi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiaChiDonVi()
    {
        return $this->diaChiDonVi;
    }

    /**
     * @param mixed $diaChiDonVi
     *
     * @return self
     */
    public function setDiaChiDonVi($diaChiDonVi)
    {
        $this->diaChiDonVi = $diaChiDonVi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSdtDonVi()
    {
        return $this->sdtDonVi;
    }

    /**
     * @param mixed $sdtDonVi
     *
     * @return self
     */
    public function setSdtDonVi($sdtDonVi)
    {
        $this->sdtDonVi = $sdtDonVi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoKM()
    {
        return $this->soKM;
    }

    /**
     * @param mixed $soKM
     *
     * @return self
     */
    public function setSoKM($soKM)
    {
        $this->soKM = $soKM;

        return $this;
    }
}