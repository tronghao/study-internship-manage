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
  @if( count($thongTinThucTap) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Email sinh viên</th>
            <th>Tên sinh viên</th>
            <th>Ngày bắt đầu thực tập</th>
            <th>Ngày kết thúc thực tập</th>
            <th>Điểm</th>
            <th>Nhận xét</th>
            @if( $choPhepChamDiem )
              <th style="width: 15%;"></th>
            @endif
          </tr>
        </thead>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($thongTinThucTap as $value)
                <tr>
                    <td> {{ $i }} </td>
                    <td> {{ $value->getDataSinhVien( 'email' ) }} </td>
                    <td> {{ $value->getDataSinhVien( 'ten' ) }} </td>
                    <td> 
                      @if($value->getNgayBatDauThucTap()  == "Chưa thiết lập")
                        {{ $value->getNgayBatDauThucTap() }}
                      @else
                        {{ date_format(date_create($value->getNgayBatDauThucTap()),"d/m/Y") }} </td>
                      @endif
                    </td>
                    <td> 
                      @if($value->getNgayKetThucThucTap()  == "Chưa thiết lập")
                        {{ $value->getNgayKetThucThucTap() }}
                      @else
                        {{ date_format(date_create($value->getNgayKetThucThucTap()),"d/m/Y") }} </td>
                      @endif
                    </td>
                    <td> {{ $value->getDataDiem( 'diem', 'nguoi-huong-dan' ) }} </td>
                    <td> {{ $value->getDataDiem( 'nhanxet', 'nguoi-huong-dan' ) }} </td>
                    @if( $choPhepChamDiem )
                    <td>
                      <div class="btn_active">
                          <a href="#">
                            <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit_{{ $i }}">
                              <i class="fas fa-edit icon_edit"></i>Chấm điểm
                            </div>
                          </a>

                          <!-- Modal Add -->
                              <div class="modal fade" id="md_Edit_{{ $i }}">
                                  <div class="modal-dialog modal-lg modal-dialog-centered">
                                      <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                          <h4 class="modal-title md_text_tb">Chấm điểm</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <!-- Modal body -->
                                          <form class="md-form" action="{{ asset('nguoi-huong-dan/cham-diem/'.$value->getDataSinhVien( 'email' )) }}" method="post">
                                          {{ csrf_field() }}
                                          <div class="modal-body" style="text-align: center; font-family: serif; font-style: 29px">
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <div class="form-group">
                                                    <label for="usr">Điểm:</label>
                                                    @if( $value->getDataDiem( 'diem', 'nguoi-huong-dan' ) == "Chưa chấm" )
                                                      <input type="number" step="any" class="form-control" id="usr" name="diem" min="0" max="10">
                                                    @else
                                                      <input type="number" step="any" class="form-control" id="usr" name="diem" min="0" max="10" value="{{ $value->getDataDiem( 'diem', 'nguoi-huong-dan' ) }}">
                                                    @endif
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <div class="form-group">
                                                    <label for="comment">Nhận xét:</label>
                                                    @if( $value->getDataDiem( 'nhanxet', 'nguoi-huong-dan' ) == "Chưa chấm" )
                                                      <textarea class="form-control" rows="5" id="comment" name="nhan-xet"></textarea>
                                                    @else
                                                      <textarea class="form-control" rows="5" id="comment" name="nhan-xet">{{ $value->getDataDiem( 'nhanxet', 'nguoi-huong-dan' ) }}</textarea>
                                                    @endif
                                                  </div>
                                              </div>
                                              <br>
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <div class="form-group">
                                                    <label for="sel1">Chọn ngày kết thúc thực tập:</label>
                                                    @if($value->getNgayKetThucThucTap()  == "Chưa thiết lập")
                                                      <input type="date" name="ngay-ket-thuc">
                                                    @else
                                                      <input type="date" name="ngay-ket-thuc" value="{{ $value->getNgayKetThucThucTap() }}">
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

                        </td>
                        @endif
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