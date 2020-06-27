<?php
namespace App\Objects;
use App\User;
use App\LopModel;
use App\Objects\Nganh;
use Excel;
use PHPExcel_IOFactory;

class Lop {
	protected $maLop;	
	protected $tenLop;
    private $nganh;
    private $lop_table;

    public function __construct() {
        $this->lop_table = new LopModel();
        $this->nganh = new Nganh();
    }

    //=============================================================

    /**
     * @return mixed
     */
    public function getMaLop()
    {
        return $this->maLop;
    }

    //=============================================================

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

    //=============================================================

    /**
     * @return mixed
     */
    public function getTenLop()
    {
        return $this->tenLop;
    }

    //=============================================================
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

    //=============================================================

    public function setData($maLop, $tenLop)
    {
        $this->maLop = $maLop;
        $this->tenLop = $tenLop;
    }

    //=============================================================

    public function setDataNganh($maNganh, $tenNganh)
    {
        $this->nganh->setMaNganh( $maNganh );
        $this->nganh->setTenNganh( $tenNganh );
    }

    //=============================================================

    public function getDataNganh($thuocTinhCanLay)
    {
        switch ($thuocTinhCanLay) {
            case 'ma':
                return $this->nganh->getMaNganh();
                break;
            
            case 'ten':
                return $this->nganh->getTenNganh();
                break;
            default:
                # code...
                break;
        }
    }

    //=============================================================
    public function getAllLop() {
        $duLieuLop = $this->lop_table->join('nganh', 'nganh.maNganh', '=', 'lop.maNganh')->get()->toArray();
        $data = [];
        foreach ($duLieuLop as $value) {
            $lop = new Lop();
            $lop->setData($value["maLop"], $value["tenLop"]);
            $lop->setDataNganh( $value["maNganh"], $value["tenNganh"] );
            $data[] = $lop;
        }
        return $data;
    }

    public function xoa_lop( $maLop ) {
       try { 
          $this->lop_table->where('maLop', '=', $maLop)->delete();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function them_lop( $data ) {
       try { 
          $lop_item = new LopModel();
          $lop_item->maLop = $data["ma-lop"];
          $lop_item->tenLop = $data["ten-lop"];
          $lop_item->maNganh = $data["ma-nganh"];
          $lop_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function sua_lop( $maLop, $data ) {
       try { 
          $lop_item = $this->lop_table->where('maLop', '=', $maLop)->first();
          $lop_item->maLop = $data["ma-lop"];
          $lop_item->tenLop = $data["ten-lop"];
          $lop_item->maNganh = $data["ma-nganh"];
          $lop_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    //===========================================================
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
              $nganh = $provinceSheet->getCellByColumnAndRow(2, $row)->getValue();
           

              $data_item = array(
                "ma-lop" => $ma,
                "ten-lop" => $ten,
                "ma-nganh" => $nganh,
              );
              if( !$this->them_lop( $data_item ) ) {
                $loi = 1;
                $thongTin .= "\\n$ma - $ten - $nganh";
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