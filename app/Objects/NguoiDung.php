<?php
namespace App\Objects;
use App\User;

class NguoiDung {
    protected $email;
	protected $hoTen;
	protected $sdt;
	protected $trangThai;
	protected $loiGioiThieu;
    protected $anhDaiDien;
    protected $loaiUser;
    protected $user;

    
	public function __construct(){
        $this->user = new User();
    }

    //=====================================================================

	//getter and setter
    /**
     * @return mixed
     */
    public function getHoTen()
    {
        return $this->hoTen;
    }

    //=====================================================================

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

    //=====================================================================

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    //=====================================================================

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

    //=====================================================================

    /**
     * @return mixed
     */
    public function getSdt()
    {
        return $this->sdt;
    }

    //=====================================================================

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

    //=====================================================================

    /**
     * @return mixed
     */
    public function getTrangThai()
    {
        return $this->trangThai;
    }

    //=====================================================================

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

    //=====================================================================

    /**
     * @return mixed
     */
    public function getLoiGioiThieu()
    {
        return $this->loiGioiThieu;
    }

    //=====================================================================

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

    //=====================================================================

        /**
     * @return mixed
     */
    public function getAnhDaiDien()
    {
        return $this->anhDaiDien;
    }

    //=====================================================================

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

    //=====================================================================

    /**
     * @return mixed
     */
    public function getLoaiUser()
    {
        return $this->loaiUser;
    }

    //=====================================================================

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

    //=====================================================================


    //phuong thuc
    
    public function setData($hoTen, $email, $trangThai, $anhDaiDien, $loaiUser)
    {
        $this->hoTen = $hoTen;
        $this->email = $email;
        $this->trangThai = $trangThai;
        $this->anhDaiDien = $anhDaiDien;
        $this->loaiUser = $loaiUser;
    }


    //=====================================================================

    public function ton_tai_user($email) {
        $soLuong = $this->user->where('email', '=', $email)->count();
        if($soLuong)
            return true;
        else return false;
    }

    //=====================================================================

    public function luu_du_lieu(NguoiDung $data) {
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

    //=====================================================================

    public function getUser($email) {
        $user_item = $this->user->where('email', '=', $email)->get();
        $nguoiDung = new NguoiDung();
        $nguoiDung->setData($user_item[0]["hoTen"], $user_item[0]["email"], $user_item[0]["trangThai"], $user_item[0]["anhDaiDien"], $user_item[0]["loaiUser"]);
        return $nguoiDung;
    }

    //=====================================================================

    public function getAll() {
        $data = $this->user->whereRaw("1 = 1")->orderBy("trangThai", "DESC")->get();
        $listUserChuaDuyet = [];
        foreach ($data as $value) {
            $tb = new NguoiDung();
            $tb->setEmail( $value["email"] );
            $tb->setHoTen( $value["hoTen"] );
            $tb->setLoiGioiThieu( $value["loiGioiThieu"] );
            $tb->setTrangThai( $value["trangThai"] );
            $tb->setSdt( $value["sdt"] );

            $listUserChuaDuyet[] = $tb;
        }

        return $listUserChuaDuyet;
    }

    //=====================================================================
    
    public function duyet_user( $email ) {
        try {
            $userItem = $this->user->where('email', '=', $email)->first();
            $userItem->trangThai = "đã duyệt";
            $userItem->save();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

    //=====================================================================

    public function xoa_user($email) {
        try {
            $this->user->where('email', '=', $email)->delete();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

    //=====================================================================

    public function sua_user($email, $data) {
        try {
            $user_item = $this->user->where('email', '=', $email)->first();
            $user_item->hoTen = $data["ho-ten"];
            $user_item->sdt = $data["sdt"];
            $user_item->save();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

}