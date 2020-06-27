<?php
namespace App\Objects;
use App\User;
use App\NganhModel;
use Excel;
use PHPExcel_IOFactory;

class Nganh {
	  protected $maNganh;	
	  protected $tenNganh;
    private $nganh_table;

    public function __construct() {
        $this->nganh_table = new NganhModel();
    }

    //================================================================

    public function setData($maNganh, $tenNganh)
    {
        $this->maNganh = $maNganh;
        $this->tenNganh = $tenNganh;
    }

        /**
     * @return mixed
     */
    public function getMaNganh()
    {
        return $this->maNganh;
    }

    /**
     * @param mixed $maNganh
     *
     * @return self
     */
    public function setMaNganh($maNganh)
    {
        $this->maNganh = $maNganh;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTenNganh()
    {
        return $this->tenNganh;
    }

    /**
     * @param mixed $tenNganh
     *
     * @return self
     */
    public function setTenNganh($tenNganh)
    {
        $this->tenNganh = $tenNganh;

        return $this;
    }
    


    public function getAll() {
        $duLieuNganh = $this->nganh_table->all();
        $data = [];
        foreach ($duLieuNganh as $value) {
            $nganh = new Nganh();
            $nganh->setData($value["maNganh"], $value["tenNganh"]);
            $data[] = $nganh;
        }
        return $data;
    }


    public function them_nganh( $data ) {
       try { 
          $nganh_item = new NganhModel();
          $nganh_item->maNganh = $data["ma-nganh"];
          $nganh_item->tenNganh = $data["ten-nganh"];
          $nganh_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function sua_nganh( $maNganh, $data ) {
       try { 
          $nganh_item = $this->nganh_table->where('maNganh', '=', $maNganh)->first();
          $nganh_item->maNganh = $data["ma-nganh"];
          $nganh_item->tenNganh = $data["ten-nganh"];
          $nganh_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function xoa_nganh( $maNganh ) {
       try { 
          $this->nganh_table->where('maNganh', '=', $maNganh)->delete();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function importByExcel( $data ) {
        $fileName = "";
        $fileSize = "";
        if ( isset( $data['fileToUpload'] ) ) {
          $file = $data['fileToUpload'];

          //Lấy Tên files
          $fileName = $file->getClientOriginalName();
          if( strpos( $fileName, ".xls" )  || strpos( $fileName, ".xlsx" ) )
          {

          }
          else return 'File không hợp lệ!';
          //Lấy kích cỡ của file đơn vị tính theo bytes
          $fileSize = $file->getSize();
          if( $fileSize > 10485760 )
            return 'Kích thước file quá lớn!';
        }

        if($fileName != "" && $fileSize < 10485760)
        {
          $thongTin = "Các dòng dữ liệu không insert thành công";
          $loi = 0;

          $file = $data['fileToUpload'];
          $file->move("public/img/upload", $file->getClientOriginalName());
           $objPHPExcel = PHPExcel_IOFactory::load(base_path("public/img/upload/$fileName")); // load file ra object PHPExcel
           $provinceSheet = $objPHPExcel->setActiveSheetIndex(0); // Set sheet sẽ được đọc dữ liệu
           $highestRow  = $provinceSheet->getHighestRow(); // Lấy số row lớn nhất trong sheet
           for ($row = 2; $row <= $highestRow; $row++) { // For chạy từ 2 vì row 1 là title
              $ma = $provinceSheet->getCellByColumnAndRow(0, $row)->getValue(); // lấy dữ liệu từng ô theo col và row
              $ten = $provinceSheet->getCellByColumnAndRow(1, $row)->getValue();
           

              $data_item = array(
                "ma-nganh" => $ma,
                "ten-nganh" => $ten,
              );
              if( !$this->them_nganh( $data_item ) ) {
                $loi = 1;
                $thongTin .= "\\n$ma - $ten";
              }
            }

          if($loi == 0) {
            $thongTin = "Nhập dữ liệu thành công";
            return $thongTin;
          } else return $thongTin;
        }
        else
        {
            return 'Lỗi file!';
        }
    }
}