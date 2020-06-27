<?php
namespace App\Objects;
use App\User;
use App\HocViModel;
use Excel;
use PHPExcel_IOFactory;

class HocVi {
	protected $maHocVi;	
	protected $tenHocVi;
    private $hocvi_table;

    public function __construct() {
        $this->hocvi_table = new HocViModel();
    }

    //================================================================

    public function setData($maHocVi, $tenHocVi)
    {
        $this->maHocVi = $maHocVi;
        $this->tenHocVi = $tenHocVi;
    }


    /**
     * @return mixed
     */
    public function getMaHocVi()
    {
        return $this->maHocVi;
    }

    /**
     * @param mixed $maHocVi
     *
     * @return self
     */
    public function setMaHocVi($maHocVi)
    {
        $this->maHocVi = $maHocVi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTenHocVi()
    {
        return $this->tenHocVi;
    }

    /**
     * @param mixed $tenHocVi
     *
     * @return self
     */
    public function setTenHocVi($tenHocVi)
    {
        $this->tenHocVi = $tenHocVi;

        return $this;
    }


    public function getAll() {
        $duLieuHocVi = $this->hocvi_table->all();
        $data = [];
        foreach ($duLieuHocVi as $value) {
            $hocVi = new HocVi();
            $hocVi->setData($value["maHocVi"], $value["tenHocVi"]);
            $data[] = $hocVi;
        }
        return $data;
    }

    public function xoa_hoc_vi( $maHV ) {
       try { 
          $this->hocvi_table->where('maHocVi', '=', $maHV)->delete();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function them_hoc_vi( $data ) {
       try { 
          $HocVi_final = $this->hocvi_table->orderBy('maHocVi', 'DESC')->take(1)->get()->toArray(); 
          $chuoi = explode("V", $HocVi_final[0]["maHocVi"]);
          $thuTu = (int)$chuoi[1] + 1;
          $maHocVi = "HV".$thuTu;

          $hocvi_item = new HocViModel();
          $hocvi_item->maHocVi = $maHocVi;
          $hocvi_item->tenHocVi = $data["ten-hoc-vi"];
          $hocvi_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function them_hoc_vi_simple( $data ) {
       try { 
          $hocvi_item = new HocViModel();
          $hocvi_item->maHocVi = $data["ma-hoc-vi"];
          $hocvi_item->tenHocVi = $data["ten-hoc-vi"];
          $hocvi_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    public function sua_hoc_vi( $maHV, $data ) {
       try { 
          $hocvi_item = $this->hocvi_table->where('maHocVi', '=', $maHV)->first();
          $hocvi_item->tenHocVi = $data["ten-hoc-vi"];
          $hocvi_item->save();
          return true;
        } catch(\Illuminate\Database\QueryException $ex){ 
          //code
          return false;
        } 
    }

    //======================================================
    
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
                "ma-hoc-vi" => $ma,
                "ten-hoc-vi" => $ten,
              );
              if( !$this->them_hoc_vi_simple( $data_item ) ) {
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