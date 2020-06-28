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
    <h6 class="m-0 font-weight-bold text-primary">Danh sách User</h6>
  </div>
  @if( count($danhsachUser) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Họ Tên</th>
            <th>Lời Giới Thiệu</th>
            <th>Vai trò</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tfoot style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Họ Tên</th>
            <th>Lời Giới Thiệu</th>
            <th>Vai trò</th>
            <th style="width: 15%;"></th>
          </tr>
        </tfoot>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($danhsachUser as $value)
              @if( $value->getTrangThai() == "admin" || $value->getTrangThai() == "disable")

              @else
                <tr>
                    <td> {{ $i }} </td>
                    <td> {{ $value->getEmail() }} </td>
                    <td> {{ $value->getHoTen() }} </td>
                    <td> {{ $value->getLoiGioiThieu() }} </td>
                    @if( $value->getLoaiUser() != "người hướng dẫn" )
                      <td> {{ $value->getLoaiUser() }} </td>
                    @else <td> cán bộ đơn vị </td>
                    @endif
                    <td>
                      <div class="btn_active">
                        @if( $value->getTrangThai() == "chờ duyệt")
                          <a href="{{ asset('admin/duyet-user/'.$value->getEmail()) }}">
                            <div class="btn btn-success btn_edit">
                              <i class="fas fa-edit icon_edit"></i>Duyệt
                            </div>
                          </a>
                        @else
                          <a href="#">
                            <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit_{{ $i }}">
                              <i class="fas fa-edit icon_edit"></i>Sửa
                            </div>
                          </a>

                          <!-- Modal Add -->
                              <div class="modal fade" id="md_Edit_{{ $i }}">
                                  <div class="modal-dialog modal-lg modal-dialog-centered">
                                      <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                          <h4 class="modal-title md_text_tb">Cập nhật User</h4>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <!-- Modal body -->
                                          <form class="md-form" action="{{ asset('admin/edit-user/'.$value->getEmail()) }}" method="post">
                                          {{ csrf_field() }}
                                          <div class="modal-body" style="text-align: center; font-family: serif; font-style: 29px">
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <h4 class="md_text">Họ tên</h4>
                                                  <input type="text" class="form-control" name="ho-ten" value="{{ $value->getHoTen() }}">
                                              </div>
                                              <br>
                                              <div class="modal-body_noidung" style="text-align: left">
                                                  <h4 class="md_text">Số điện thoại</h4>
                                                  <input type="tel" class="form-control" name="sdt" value="{{ $value->getSdt() }}" pattern="(^0[0-9]{9,10})+">
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
                        @endif
                          <a href="{{ asset('admin/xoa-user/'.$value->getEmail()) }}">
                            <div class="btn btn-danger btn_delete">
                                <i class="far fa-trash-alt icon_delete"></i>Xóa
                            </div>
                          </a>
                      </div>
                  </td>
                </tr>
                  @php $i++ @endphp
                @endif
          @endforeach

        </tbody>
      </table>
      
    </div>
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