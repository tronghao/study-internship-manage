<?php

class NguoiDung {
	protected $id;	
	protected $hoTen;
	protected $email;
	protected $sdt;
	protected $trangThai;
	protected $loiGioiThieu;

	public function __construct(){

    }

	//getter and setter
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHoTen()
    {
        return $this->hoTen;
    }

    /**
     * @param mixed $hoTen
     *
     * @return self
     */
    public function setHoTen($hoTen)
    {
        $this->hoTen = $hoTen;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSdt()
    {
        return $this->sdt;
    }

    /**
     * @param mixed $sdt
     *
     * @return self
     */
    public function setSdt($sdt)
    {
        $this->sdt = $sdt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrangThai()
    {
        return $this->trangThai;
    }

    /**
     * @param mixed $trangThai
     *
     * @return self
     */
    public function setTrangThai($trangThai)
    {
        $this->trangThai = $trangThai;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLoiGioiThieu()
    {
        return $this->loiGioiThieu;
    }

    /**
     * @param mixed $loiGioiThieu
     *
     * @return self
     */
    public function setLoiGioiThieu($loiGioiThieu)
    {
        $this->loiGioiThieu = $loiGioiThieu;

        return $this;
    }


    //phuong thuc
    public function dang_xuat() {

    }
}