<script>
  $(document).ready( function () {
    $('#tableData').DataTable();
} );
</script>

<br>

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Danh sách thực tập</h6>
  </div>
  @if( count($danhSachThucTap) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Sinh Viên</th>
            <th>Giảng Viên</th>
            <th>Cán Bộ</th>
            <th>Đơn Vị</th>
            <th>Ngày bắt đầu thực tập</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tfoot style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Sinh Viên</th>
            <th>Giảng Viên</th>
            <th>Cán Bộ</th>
            <th>Đơn Vị</th>
            <th>Ngày bắt đầu thực tập</th>
            <th style="width: 25%;"></th>
          </tr>
        </tfoot>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($danhSachThucTap as $value)
                <tr>
                    <td> {{ $i }} </td>
                    <td> {{ $value->getDataSinhVien( 'ten' ) }} </td>
                    <td> {{ $value->getDataGiangVien( 'ten' ) }} </td>
                    <td> {{ $value->getDataNguoiHuongDan( 'ten' ) }} </td>
                    <td> {{ $value->getDataDonVi( 'tenDonVi' ) }} </td>
                    <td> 
                      @if($value->getNgayBatDauThucTap()  == "Chưa thiết lập")
                        {{ $value->getNgayBatDauThucTap() }}
                      @else
                        {{ date_format(date_create($value->getNgayBatDauThucTap()),"d/m/Y") }} 
                      @endif
                    </td>
                    <td>
                      <div class="btn_active">
                          <a href="#">
                            <div class="btn btn-info btn_edit" data-toggle="modal" data-target="#md_Edit_{{ $i }}_">
                              <i class="fas fa-edit icon_edit"></i>Thông tin
                            </div>
                          </a>
                          
                          <!-- Modal Info -->
                              <div class="modal fade" id="md_Edit_{{ $i }}_">
                                  <div class="modal-dialog modal-lg modal-dialog-centered">
                                      <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                          <h4 class="modal-title md_text_tb">Thông tin thực tập</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <!-- Modal body -->
                                          <div class="modal-body" style="text-align: left; font-family: serif; font-style: 29px">
                                              <p><b>Email sinh viên:</b> {{ $value->getDataSinhVien( 'email' ) }}</p>
                                              <p><b>Họ tên sinh viên:</b> {{ $value->getDataSinhVien( 'ten' ) }}</p>
                                              <br>
                                              <p><b>Ngày bắt đầu thực tập:</b> 
                                                @if($value->getNgayBatDauThucTap()  == "Chưa thiết lập")
                                                  {{ $value->getNgayBatDauThucTap() }}
                                                @else
                                                  {{ date_format(date_create($value->getNgayBatDauThucTap()),"d/m/Y") }} 
                                                @endif
                                              </p>
                                              <p><b>Ngày kết thúc thực tập:</b> 
                                                @if($value->getNgayKetThucThucTap()  == "Chưa thiết lập")
                                                  {{ $value->getNgayKetThucThucTap() }}
                                                @else
                                                  {{ date_format(date_create($value->getNgayKetThucThucTap()),"d/m/Y") }} 
                                                @endif
                                              </p>
                                              <br>
                                              <p><b>Tên giảng viên:</b> {{ $value->getDataGiangVien( 'ten' ) }}</p>
                                              <p><b>Điểm số:</b> {{ $value->getDataDiem( 'diem', "giang-vien") }}</p>
                                              <p><b>Nhận xét:</b> {{ $value->getDataDiem( 'nhanxet', "giang-vien") }}</p>
                                              <br>
                                              <p><b>Tên cán bộ:</b> {{ $value->getDataNguoiHuongDan( 'ten' ) }}</p>
                                              <p><b>Điểm số:</b> {{ $value->getDataDiem( 'diem', "nguoi-huong-dan") }}</p>
                                              <p><b>Nhận xét:</b> {{ $value->getDataDiem( 'nhanxet', "nguoi-huong-dan") }}</p>
                                              <br>
                                              <p><b>Điểm trung bình của sinh viên:</b> {{ $value->tinh_diem_trung_binh( $value ) }}</p>
                                          </div>
                                      </div>
                                  </div>
                              </div> <!-- end model add -->

                          <a href="#">
                            <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit_{{ $i }}">
                              <i class="fas fa-edit icon_edit"></i>Sửa
                            </div>
                          </a>

                          <!-- Modal Edit -->
                              <div class="modal fade" id="md_Edit_{{ $i }}">
                                  <div class="modal-dialog modal-lg modal-dialog-centered">
                                      <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                          <h4 class="modal-title md_text_tb">Cập nhật thực tập</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <!-- Modal body -->
                                          <form class="md-form" action="{{ asset('admin/edit-thuc-tap/'.$value->getDataSinhVien( 'email' )) }}" method="post">
                                          {{ csrf_field() }}
                                          <div class="modal-body" style="text-align: center; font-family: serif; font-style: 29px">
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <div class="form-group">
                                                    <label for="sel1">Chọn giảng viên:</label>
                                                    <select class="form-control" id="sel1" name="giang-vien" required>
                                                      @if( $value->getDataGiangVien( 'ten' ) == "Chưa có")
                                                        <option value="NULL" selected></option>
                                                      @else 
                                                        <option value="NULL"></option>
                                                      @endif

                                                      @foreach($danhSachGiangVien as $gv)
                                                        @if($value->getDataGiangVien( 'ten' ) == $gv->getHoTen() )
                                                          <option value="{{ $gv->getEmail() }}" selected> {{ $gv->getHoTen() }} </option>
                                                        @else
                                                          <option value="{{ $gv->getEmail() }}"> {{ $gv->getHoTen() }} </option>                                                       
                                                        @endif
                                                      @endforeach
                                                    </select>
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <div class="form-group">
                                                    <label for="sel1">Chọn cán bộ:</label>
                                                    <select class="form-control" id="selNHD" name="nguoi-huong-dan" required>
                                                      @if( $value->getDataNguoiHuongDan( 'ten' ) == "Chưa có")
                                                        <option value="NULL" selected></option>
                                                      @else 
                                                        <option value="NULL"></option>
                                                      @endif

                                                      @foreach($danhSachNHD as $cb)
                                                        @if($value->getDataNguoiHuongDan( 'ten' ) == $cb->getHoTen() )
                                                          <option value="{{ $cb->getEmail() }}" selected> {{ $cb->getHoTen() }} </option>
                                                        @else 
                                                          <option value="{{ $cb->getEmail() }}"> {{ $cb->getHoTen() }} </option>
                                                        @endif
                                                      @endforeach
                                                    </select>
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <div class="form-group">
                                                    <label for="sel1">Chọn đơn vị:</label>
                                                    <select class="form-control" id="sel1" name="don-vi" required onchange="thayDoiGiaTri(this)">
                                                      @foreach($danhSachDonVi as $dv)
                                                        @if($value->getDataDonVi( 'tenDonVi' ) == $dv->getTenDonVi() )
                                                          <option value="{{ $dv->getMaDonVi() }}" selected> {{ $dv->getTenDonVi() }} </option>
                                                        @else 
                                                          <option value="{{ $dv->getMaDonVi() }}"> {{ $dv->getTenDonVi() }} </option>
                                                        @endif
                                                      @endforeach
                                                    </select>
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <div class="form-group">
                                                    <label for="sel1">Chọn ngày bắt đầu thực tập:</label>
                                                    @if($value->getNgayBatDauThucTap()  == "Chưa thiết lập")
                                                      <input type="date" name="ngay-bat-dau">
                                                    @else
                                                      <input type="date" name="ngay-bat-dau" value="{{ $value->getNgayBatDauThucTap() }}">
                                                    @endif
                                                  </div>
                                              </div>
                                              <br>
                                          </div>
                                          <!-- Modal footer -->
                                          <div class="modal-footer">
                                              <button type="submit" class="btn btn-success" >Cập nhật</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                          </div>
                                          </form>
                                      </div>
                                  </div>
                              </div> <!-- end model add -->

                          <a href="{{ asset('admin/xoa-thuc-tap/'.$value->getDataSinhVien( 'email' )) }}">
                            <div class="btn btn-danger btn_delete">
                                <i class="far fa-trash-alt icon_delete"></i>Xóa
                            </div>
                          </a>
                      </div>
                  </td>
                </tr>
                  @php $i++ @endphp
          @endforeach

        </tbody>
      </table>
      
    </div>
  </div>
  @else
     <div class="card-body">
        <p>Chưa có sinh viên đăng ký thực tập</p>
    </div>
  @endif
</div>


 
  <!-- link head -->
  <link rel="stylesheet" href=" {{ asset('public/css/thong-bao.css') }} ">
  <script src=" {{ asset('public/admin/datatables/jquery.dataTables.min.js') }} "></script>



  <!--   style -->
    <style>
      /* display */
    div#tableData_length {
        display: none;
    }

    div#tableData_filter {
        display: none;
    }

    div#tableData_info {
        display: none;
    }



    .custom-file-input:lang(en)~.custom-file-label::after {
        content: "Chọn ảnh";
    }
    </style>