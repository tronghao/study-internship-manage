<?php
namespace App\Objects;
use App\User;

class NguoiDung {
	protected $id;	
	protected $hoTen;
	protected $email;
	protected $sdt;
	protected $trangThai;
	protected $loiGioiThieu;
    protected $anhDaiDien;
    protected $loaiUser;
    protected $user;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $hoTen   
     * @param    $email   
     * @param    $sdt   
     * @param    $trangThai   
     * @param    $loiGioiThieu   
     * @param    $anhDaiDien   
     * @param    $loaiUser   
     * @param    $user   
     */
    
	public function __construct(){
        $this->user = new User();
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

        /**
     * @return mixed
     */
    public function getAnhDaiDien()
    {
        return $this->anhDaiDien;
    }

    /**
     * @param mixed $anhDaiDien
     *
     * @return self
     */
    public function setAnhDaiDien($anhDaiDien)
    {
        $this->anhDaiDien = $anhDaiDien;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getLoaiUser()
    {
        return $this->loaiUser;
    }

    /**
     * @param mixed $loaiUser
     *
     * @return self
     */
    public function setLoaiUser($loaiUser)
    {
        $this->loaiUser = $loaiUser;

        return $this;
    }


    //phuong thuc
    
    public function setData($hoTen, $email, $trangThai, $anhDaiDien, $loaiUser)
    {
        $this->hoTen = $hoTen;
        $this->email = $email;
        $this->trangThai = $trangThai;
        $this->anhDaiDien = $anhDaiDien;
        $this->loaiUser = $loaiUser;
    }

    public function dang_xuat() {

    }

    public function ton_tai_user($email) {
        $soLuong = $this->user->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
    }

    public function luu_du_lieu(NguoiDung $data) {
        $this->user->id = $this->getGUID();
        $this->user->hoTen = $data->getHoTen();
        $this->user->email = $data->getEmail();
        $this->user->anhDaiDien = $data->getAnhDaiDien();
        $this->user->password = "djflkdsafdsfdsipofsdvuioxvncxvasfjdiofjwoirueojsdkfjsdfsdj";
        $this->user->sdt = "";
        $this->user->trangThai = $data->getTrangThai();
        $this->user->loiGioiThieu = "";
        $this->user->loaiUser = $data->getLoaiUser();
        $this->user->save();
    }

    function getGUID(){
        if (function_exists('com_create_guid')){
            return com_create_guid();
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
        }
    }
}