<script>
  $(document).ready( function () {
      $('#tableData').DataTable();
  });
</script>
  
<div class="container_content">
      <!-- Header content -->
    <div class="header_content">
    </div>
    <div class="header_button">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#md_Add">
            <i class="fas fa-plus-circle content_icon-plus"></i>
            Thêm chức vụ
        </button>
    </div>
</div>
<br>

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Chức vụ</h6>
  </div>
  @if( count($danhSachChucVu) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Mã chức vụ</th>
            <th>Tên chức vụ</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tfoot style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Mã chức vụ</th>
            <th>Tên chức vụ</th>
            <th style="width: 15%;"></th>
          </tr>
        </tfoot>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($danhSachChucVu as $value)
              <tr>
                  <td> {{ $i }} </td>
                  <td> {{ $value->getMaChucVu() }} </td>
                  <td> {{ $value->getTenChucVu() }} </td>
                  <td>
                    <div class="btn_active">
                        <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit_{{ $i }}">
                            <i class="fas fa-edit icon_edit"></i>Sửa
                        </div>
                        <a href="{{ asset('admin/xoa-chuc-vu/'.$value->getMaChucVu()) }}">
                          <div class="btn btn-danger btn_delete">
                              <i class="far fa-trash-alt icon_delete"></i>Xóa
                          </div>
                        </a>

                        <!-- The Modal -->
                          <div class="modal fade" id="md_Edit_{{ $i }}">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                      <h4 class="modal-title">Cập nhật chức vụ</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                          <form action="{{ asset('admin/sua-chuc-vu/'.$value->getMaChucVu()) }}" method="post">
                                            {{ csrf_field() }}

                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">Tên chức vụ:</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="ten-chuc-vu" required value="{{ $value->getTenChucVu() }}">
                                              </div>

                                              
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                              </div>
                          </div> <!-- end model -->

                    </div>
                </td>
              </tr>
            @php $i++ @endphp
          @endforeach

        </tbody>
      </table>
      
    </div>
  </div>
  @endif
</div>


  <!-- The Modal -->
        <div class="modal fade" id="md_Add">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Thêm Chức Vụ</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ asset('admin/them-chuc-vu') }}" method="post">
                          {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tên chức vụ:</span>
                                </div>
                                <input type="text" class="form-control" name="ten-chuc-vu" required>
                            </div>                  
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
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