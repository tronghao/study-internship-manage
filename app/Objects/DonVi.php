<?php
namespace App\Objects;
use App\User;
use App\DonViThucTapModel;


class DonVi {
	protected $maDonVi;	
	protected $tenDonVi;
    protected $diaChiDonVi;
    protected $sdtDonVi;
    protected $soKM;

    private $donvi_table;


    public function __construct() {
        $this->donvi_table = new DonViThucTapModel();

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

    //============================================================
    
    public function setData($maDonVi, $tenDonVi, $diaChiDonVi, $sdtDonVi, $soKM)
    {
        $this->maDonVi = $maDonVi;
        $this->tenDonVi = $tenDonVi;
        $this->diaChiDonVi = $diaChiDonVi;
        $this->sdtDonVi = $sdtDonVi;
        $this->soKM = $soKM;
    }

    //============================================================

    public function getAll() {
        $duLieu = $this->donvi_table->all();
        $listDonVi = [];
        foreach($duLieu as $value) {
            $donViItem = new DonVi();
            $donViItem->setMaDonVi($value["maDonVi"]);
            $donViItem->setTenDonVi($value["tenDonVi"]);
            $donViItem->setDiaChiDonVi($value["diaChiDonVi"]);
            $donViItem->setSdtDonVi($value["sdtDonVi"]);
            $donViItem->setSoKM($value["soKM"]);
            $listDonVi[] = $donViItem;
        }
        return $listDonVi;
    }

    //============================================================

    public function xoa_don_vi($maDV) {
        try {
            $this->donvi_table->where('maDonVi', '=', $maDV)->delete();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

    //============================================================
    
    public function them_don_vi( $data ) {
        try {
            $donvi_item = new DonViThucTapModel();
            $donvi_item->maDonVi = $data["ma-don-vi"];
            $donvi_item->tenDonVi = $data["ten-don-vi"];
            $donvi_item->diaChiDonVi = $data["dia-chi"];
            $donvi_item->sdtDonVi = $data["sdt"];
            $donvi_item->soKM = $data["so-km"]; 
            $donvi_item->save();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

    //============================================================
    public function sua_don_vi( $maDV, $data ) {
        try {
            $donvi_item = $this->donvi_table->where('maDonVi', '=', $maDV)->first();
            $donvi_item->maDonVi = $data["ma-don-vi"];
            $donvi_item->tenDonVi = $data["ten-don-vi"];
            $donvi_item->diaChiDonVi = $data["dia-chi"];
            $donvi_item->sdtDonVi = $data["sdt"];
            $donvi_item->soKM = $data["so-km"];  
            $donvi_item->save();

            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

    //============================================================

    public function getSoKMByMaDV( $maDV ) {
        $data = $this->donvi_table->where('maDonVi', '=', $maDV)->get();
        return $data[0]["soKM"];
    }
}