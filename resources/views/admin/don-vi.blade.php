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
            Thêm đơn vị
        </button>
    </div>
</div>
<br>

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Đơn vị thực tập</h6>
  </div>
  @if( count($duLieuDonVi) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Mã đơn vị</th>
            <th>Tên đơn vị</th>
            <th>Địa chỉ</th>
            <th>SDT</th>
            <th>Số KM</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tfoot style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Mã đơn vị</th>
            <th>Tên đơn vị</th>
            <th>Địa chỉ</th>
            <th>SDT</th>
            <th>Số KM</th>
            <th style="width: 15%;"></th>
          </tr>
        </tfoot>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($duLieuDonVi as $value)
              <tr>
                  <td> {{ $i }} </td>
                  <td> {{ $value->getMaDonVi() }} </td>
                  <td> {{ $value->getTenDonVi() }} </td>
                  <td> {{ $value->getDiaChiDonVi() }} </td>
                  <td> {{ $value->getSdtDonVi() }} </td>
                  <td> {{ $value->getSoKM() }} </td>
                  <td>
                    <div class="btn_active">
                        <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit_{{ $value->getMaDonVi() }}">
                            <i class="fas fa-edit icon_edit"></i>Sửa
                        </div>
                        <a href="{{ asset('admin/xoa-don-vi/'.$value->getMaDonVi()) }}">
                          <div class="btn btn-danger btn_delete">
                              <i class="far fa-trash-alt icon_delete"></i>Xóa
                          </div>
                        </a>

                        <!-- The Modal -->
                          <div class="modal fade" id="md_Edit_{{ $value->getMaDonVi() }}">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                      <h4 class="modal-title">Cập nhật đơn vị thực tập</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                          <form action="{{ asset('admin/sua-don-vi/'.$value->getMaDonVi()) }}" method="post">
                                            {{ csrf_field() }}
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">Mã đơn vị:</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="ma-don-vi" value="{{ $value->getMaDonVi() }}" required>
                                              </div>

                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">Tên đơn vị:</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="ten-don-vi" required value="{{ $value->getTenDonVi() }}">
                                              </div>

                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">Địa chỉ:</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="dia-chi" required value="{{ $value->getDiaChiDonVi() }}">
                                              </div>

                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">Số ĐT:</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="sdt" pattern="(^0[0-9]{9})+" value="{{ $value->getSdtDonVi() }}">
                                              </div>

                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text" >Số Km:</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="so-km" pattern="\d+" value="{{ $value->getSoKM() }}">
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
                    <h4 class="modal-title">Thêm đơn vị thực tập</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ asset('admin/them-don-vi') }}" method="post">
                          {{ csrf_field() }}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mã đơn vị:</span>
                                </div>
                                <input type="text" class="form-control" name="ma-don-vi" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tên đơn vị:</span>
                                </div>
                                <input type="text" class="form-control" name="ten-don-vi" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Địa chỉ:</span>
                                </div>
                                <input type="text" class="form-control" name="dia-chi" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Số ĐT:</span>
                                </div>
                                <input type="text" class="form-control" name="sdt" pattern="(^0[0-9]{9})+">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" >Số Km:</span>
                                </div>
                                <input type="text" class="form-control" name="so-km" pattern="\d+">
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