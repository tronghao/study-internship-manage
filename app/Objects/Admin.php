<?php
namespace App\Objects;

use App\Objects\NguoiDung;
use App\ThongBaoModel;
use App\Objects\ThongBao;
use App\KinhPhiHoTroModel;
use App\DonViThucTapModel;
use App\Objects\DonVi;
use App\Objects\ThucTap;
use App\Objects\HocVi;
use App\Objects\Nganh;
use App\Objects\ChucVu;
use App\Objects\Lop;
use PHPExcel;
use PHPExcel_IOFactory;
use App\Objects\Option;

class Admin extends NguoiDung {

	private $password;
	private $thongBao;
	private $kinhPhi;
	private $donVi;
	private $thucTap;
	private $hocVi;
	private $nganh;
	private $chucVu;
	private $lop;
	private $option;

	public function __construct() {
		parent::__construct();
		$this->thongBao = new ThongBao();
		$this->kinhPhi = new KinhPhiHoTroModel();
		$this->donVi = new DonVi();
		$this->thucTap = new ThucTap();
		$this->hocVi = new HocVi();
		$this->nganh = new Nganh();
		$this->chucVu = new ChucVu();
		$this->lop = new Lop();
		$this->option = new Option();
    }

    //=====================================================================

	//getter and setter
	/**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    //=====================================================================

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    //=====================================================================


	//CRUD thong bao
	public function them_thong_bao($data, $fileName) {
		return $this->thongBao->them_thong_bao( $data, $fileName );
	}

	//=====================================================================

	public function sua_thong_bao($id, $fileName, $data) {
		return $this->thongBao->sua_thong_bao( $id, $fileName, $data );
	}

	//=====================================================================

	public function xoa_thong_bao($id) {
		return $this->thongBao->xoa_thong_bao( $id );
	}

	//=====================================================================

	public function hien_thi_thong_bao() {
		$listThongBao = $this->thongBao->getAll();
		return $listThongBao;
	}

	//=====================================================================

	public function hien_thi_kinh_phi() {
		$duLieu = $this->kinhPhi->all();
		return $duLieu[0];
	}

	//=====================================================================

	public function cap_nhat_kinh_phi($kp) {
		try { 
			$duLieu = $this->kinhPhi->where('idKinhPhi', '=', 1)->first();
			$duLieu->soTien = $kp;
			$duLieu->save();
			return true;
		} catch(\Illuminate\Database\QueryException $ex){ 
		  	return false;
		}
		
	}

	//=====================================================================

	public function hien_thi_don_vi() {
		return $this->donVi->getAll();
	}

	//=====================================================================

	public function xoa_don_vi($maDV) {
		return $this->donVi->xoa_don_vi( $maDV );
	}

	//=====================================================================

	public function them_don_vi($data) {
		return $this->donVi->them_don_vi( $data );
	}

	//=====================================================================

	public function sua_don_vi($maDV, $data) {
		return $this->donVi->sua_don_vi( $maDV, $data );
	}

	//=====================================================================

	//user
	public function danh_sach_user() {
        return $this->getAll();
    }

    public function get_all_role_user( $role) {
        return $this->getAllRole( $role );
    }

	//=====================================================================

	//tim kiem
	public function tim_user($emailUser) {

	}

	public function ket_qua_thuc_tap_cua_mot_sinh_vien($emailSinhVien) {

	}

	public function chi_tiet_thuc_tap_cua_mot_sinh_vien($emailSinhVien) {

	}


	//danh sach
	public function get_danh_sach_thuc_tap() {
		return $this->thucTap->getAll();
	}

	public function xoa_thuc_tap( $email ) {
		return $this->thucTap->xoa_dang_ky( $email );
	}

	public function sua_thuc_tap( $email, $data ) {
		return $this->thucTap->cap_nhat_dang_ky( $email, $data );
	}


	public function danh_sach_ket_qua() {

	}


	//CRUD hoc vi
	public function get_all_hoc_vi() {
		return $this->hocVi->getAll();
	}


	public function them_hoc_vi( $data ) {
		return $this->hocVi->them_hoc_vi( $data );
	}

	public function xoa_hoc_vi( $maHV ) {
		return $this->hocVi->xoa_hoc_vi( $maHV );
	}

	public function sua_hoc_vi($maHV, $data) {
		return $this->hocVi->sua_hoc_vi( $maHV, $data );
	}


	//CRUD lop
	public function get_all_lop() {
		return $this->lop->getAllLop();
	}
	public function them_lop( $data ) {
		return $this->lop->them_lop( $data );
	}

	public function xoa_lop( $maLop ) {
		return $this->lop->xoa_lop( $maLop );
	}

	public function sua_lop( $maLop, $data ) {
		return $this->lop->sua_lop( $maLop, $data );
	}


	//CRUD nganh
	public function get_all_nganh() {
		return $this->nganh->getAll();
	}
	public function them_nganh( $data ) {
		return $this->nganh->them_nganh( $data );
	}

	public function xoa_nganh( $maNganh ) {
		return $this->nganh->xoa_nganh( $maNganh ); 
	}

	public function sua_nganh( $maNganh, $data ) {
		return $this->nganh->sua_nganh( $maNganh, $data );
	}

	//CRUD hoc vi
	public function get_all_chuc_vu() {
		return $this->chucVu->getAll();
	}


	public function them_chuc_vu( $data ) {
		return $this->chucVu->them_chuc_vu( $data );
	}

	public function xoa_chuc_vu( $maCV ) {
		return $this->chucVu->xoa_chuc_vu( $maCV );
	}

	public function sua_chuc_vu($maCV, $data) {
		return $this->chucVu->sua_chuc_vu( $maCV, $data );
	}

	public function xuat_du_lieu_thuc_tap() {
		$data = $this->thucTap->getAll();
		$excel = new PHPExcel();
		$excel->createSheet();
		$activeSheet = $excel->setActiveSheetIndex(1);
		$activeSheet->setTitle( "Dữ Liệu Thực Tập" );

		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
		$excel->getActiveSheet()->getStyle('A2:I2')->getFont()->setBold(true);

		$activeSheet->setCellValue('A2', 'STT')
			->setCellValue('B2', 'Email sinh viên')
			->setCellValue('C2', 'Tên sinh viên')
			->setCellValue('D2', 'Điểm trung bình')
			->setCellValue('E2', 'Tên người chấm')
			->setCellValue('F2', 'Số điểm')
			->setCellValue('G2', 'Nhận xét')
			->setCellValue('H2', 'Ngày bắt đầu thực tập')
			->setCellValue('I2', 'Ngày kết thúc thực tập');

		$numRow = 3;
		$stt = 1;
		foreach ($data as $value) {
			
				$excel->getActiveSheet()->setCellValue('A' . $numRow, $stt);
			    $excel->getActiveSheet()->setCellValue('B' . $numRow, $value->getDataSinhVien( 'email' ) );
			    $excel->getActiveSheet()->setCellValue('C' . $numRow, $value->getDataSinhVien( 'ten' ) );			    
			    $excel->getActiveSheet()->setCellValue('D' . $numRow, $value->tinh_diem_trung_binh( $value ) );
			    $excel->getActiveSheet()->setCellValue('E' . $numRow, $value->getDataGiangVien( 'ten' ) );
			    $excel->getActiveSheet()->setCellValue('F' . $numRow, $value->getDataDiem( 'diem', 'giang-vien' ) );
			    $excel->getActiveSheet()->setCellValue('G' . $numRow, $value->getDataDiem( 'nhanxet', 'giang-vien' ) );
			    $excel->getActiveSheet()->setCellValue('H' . $numRow, $value->getNgayBatDauThucTap() );
			    $excel->getActiveSheet()->setCellValue('I' . $numRow, $value->getNgayKetThucThucTap() );

			    $numRow++;

			    $excel->getActiveSheet()->setCellValue('E' . $numRow, $value->getDataNguoiHuongDan( 'ten' ) );
			    $excel->getActiveSheet()->setCellValue('F' . $numRow, $value->getDataDiem( 'diem', 'nguoi-huong-dan' ) );
			    $excel->getActiveSheet()->setCellValue('G' . $numRow, $value->getDataDiem( 'nhanxet', 'nguoi-huong-dan' ) );
			    $excel->getActiveSheet()->setCellValue('H' . $numRow, $value->getNgayBatDauThucTap() );
			    $excel->getActiveSheet()->setCellValue('I' . $numRow, $value->getNgayKetThucThucTap() );

			    $numRowMergePrevious = $numRow - 1;
			    $activeSheet->mergeCells("A$numRowMergePrevious:A$numRow");
			    $activeSheet->mergeCells("B$numRowMergePrevious:B$numRow");
			    $activeSheet->mergeCells("C$numRowMergePrevious:C$numRow");
			    $activeSheet->mergeCells("D$numRowMergePrevious:D$numRow");

				$numRow++;
				$stt++;
		}

		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="duLieuThucTap.xlsx"');
		PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
	}

	//===============================================================
	
	public function choPhepDangKy() {
		return $this->option->choPhepDangKy();
	}

	//===============================================================
	
	public function choPhepChamDiem() {
		return $this->option->choPhepChamDiem();
	}

	//===============================================================
	
	public function cap_nhat_cai_dat( $data ) {
		return $this->option->cap_nhat_cai_dat( $data );
	}

	public function xu_ly_nhap_du_lieu( $table, $data ) {
		switch ($table) {
			case 'nganh':
				return $this->nganh->importByExcel( $data );
				break;
			
			case 'lop':
				return $this->lop->importByExcel( $data );
				break;

			case 'hoc-vi':
				return $this->hocVi->importByExcel( $data );
				break;

			case 'chuc-vu':
				return $this->chucVu->importByExcel( $data );
				break;
			default:
				# code...
				break;
		}
	}
}