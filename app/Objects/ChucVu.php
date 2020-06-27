<?php
namespace App\Objects;
use App\User;
use App\ChucVuModel;
use Excel;
use PHPExcel_IOFactory;

class ChucVu {
	protected $maChucVu;	
	protected $tenChucVu;
    private $chucvu_table;


    public function __construct() {
        $this->chucvu_table = new ChucVuModel();
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


    //================================================================
        
    public function setData($maChucVu, $tenChucVu)
    {
        $this->maChucVu = $maChucVu;
        $this->tenChucVu = $tenChucVu;
    }

    //================================================================
    
    public function getAll() {
        $duLieuChucVu = $this->chucvu_table->all();
        $data = [];
        foreach ($duLieuChucVu as $value) {
            $chucVu = new ChucVu();
            $chucVu->setData($value["maChucVu"], $value["tenChucVu"]);
            $data[] = $chucVu;
        }
        return $data;
    }

    public function xoa_chuc_vu( $maCV ) {
       try { 
          $this->chucvu_table->where('maChucVu', '=', $maCV)->delete();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }


    public function them_chuc_vu( $data ) {
       try { 
          $ChucVu_final = $this->chucvu_table->orderBy('maChucVu', 'DESC')->take(1)->get()->toArray(); 
          $chuoi = explode("V", $ChucVu_final[0]["maChucVu"]);
          $thuTu = (int)$chuoi[1] + 1;
          $maChucVu = "CV".$thuTu;

          $chucvu_item = new ChucVuModel();
          $chucvu_item->maChucVu = $maChucVu;
          $chucvu_item->tenChucVu = $data["ten-chuc-vu"];
          $chucvu_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function them_chuc_vu_simple( $data ) {
       try { 
          $chucvu_item = new ChucVuModel();
          $chucvu_item->maChucVu = $data["ma-chuc-vu"];
          $chucvu_item->tenChucVu = $data["ten-chuc-vu"];
          $chucvu_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function sua_chuc_vu( $maCV, $data ) {
       try { 
          $chucvu_item = $this->chucvu_table->where('maChucVu', '=', $maCV)->first();
          $chucvu_item->tenChucVu = $data["ten-chuc-vu"];
          $chucvu_item->save();
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
                "ma-chuc-vu" => $ma,
                "ten-chuc-vu" => $ten,
              );
              if( !$this->them_chuc_vu_simple( $data_item ) ) {
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