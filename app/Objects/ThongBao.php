<?php
namespace App\Objects;

use App\ThongBaoModel;

class ThongBao {
	protected $id;	
	protected $img;
	protected $title;
	protected $content;
	protected $quote;
    private $thongbao_table;

    public function __construct() {
        $this->thongbao_table = new ThongBaoModel();
    }  


    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param mixed $quote
     *
     * @return self
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;

        return $this;
    }

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
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     *
     * @return self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    //================================================================
    
    public function setDaTa($id, $img, $title, $content, $quote)
    {
        $this->id = $id;
        $this->img = $img;
        $this->title = $title;
        $this->content = $content;
        $this->quote = $quote;
    }

    //================================================================

    public function get_3_thong_bao() {
        $data = $this->thongbao_table->whereRaw("1 = 1")->orderBy('id', 'DESC')->take(3)->get();
        $listThongBao = [];
        foreach ($data as $value) {
            $tb = new ThongBao();
            $tb->setDaTa($value["id"], $value["img"], $value["title"], $value["content"], $value["quote"]);
            $listThongBao[] = $tb;
        }
        return $listThongBao;
    }

    //================================================================

    public function get_1_thong_bao($id) {
        $data = $this->thongbao_table->whereRaw("id = ?", [$id])->get();
        foreach ($data as $value) {
            $tb = new ThongBao();
            $tb->setDaTa($value["id"], $value["img"], $value["title"], $value["content"], $value["quote"]);

            return $tb;
        }
    }

    //================================================================
    
    public function getAll() {
        $duLieu = $this->thongbao_table->all();
        $listThongBao = [];
        foreach($duLieu as $value) {
            $thongBaoItem = new ThongBao();
            $thongBaoItem->setDaTa($value["id"], $value["img"], $value["title"], $value["content"], $value["quote"]);
            $listThongBao[] = $thongBaoItem;
        }
        return $listThongBao;
    }

    //================================================================

    public function xoa_thong_bao( $id ) {
        try {
            $this->thongbao_table->where('id', '=', $id)->delete();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

    //================================================================
    
    public function them_thong_bao( $data, $fileName ) {
        try {
            $tb_item = new ThongBaoModel();
            $tb_item->img = $fileName;
            $tb_item->title = htmlspecialchars( $data["tieu-de"] );
            $tb_item->content = htmlspecialchars( $data["noi-dung"] );
            $tb_item->quote = htmlspecialchars( $data["trich-dan"] );
            $tb_item->email = "admin@admin";
            $tb_item->save();
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }

    //================================================================
    
    public function sua_thong_bao($id, $fileName, $data) {
        try {

            if($fileName == "giữ lại") {
                $tb_item = $this->thongbao_table->where('id', '=', $id)->first();
                $tb_item->title = $data["tieu-de"];
                $tb_item->content = $data["noi-dung"];
                $tb_item->quote = $data["trich-dan"];
                $tb_item->save();
            }
            else {
                $tb_item = $this->thongbao_table->where('id', '=', $id)->first();
                $tb_item->img = $fileName;
                $tb_item->title = $data["tieu-de"];
                $tb_item->content = $data["noi-dung"];
                $tb_item->quote = $data["trich-dan"];
                $tb_item->save();
            }
            return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          return false;
        }
    }
}