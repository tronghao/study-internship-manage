<script>
  $(document).ready( function () {
      $('#tableData').DataTable();
  });
</script>

@if($trangThaiDangKy != "Đã đăng ký")  
<div class="container_content">
      <!-- Header content -->
    <div class="header_content">
    </div>
    <div class="header_button">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#md_Add">
            <i class="fas fa-plus-circle content_icon-plus"></i>
            Đăng ký thực tập
        </button>
    </div>
</div>
<br>

 <!-- The Modal -->
        <div class="modal fade" id="md_Add">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Đăng ký thực tập</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ asset('sinh-vien/dang-ky-thuc-tap') }}" method="post">
                          {{ csrf_field() }}

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Đơn vị:</span>
                                </div>
                                <select class="form-control" id="sel1" name="don-vi">
                                  @foreach($donVi as $value)
                                     <option value="{{ $value->getMaDonVi() }}">{{ $value->getTenDonVi() }}</option>
                                  @endforeach
                                </select>
                            </div>

                            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Đăng Ký</button>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
@else

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Kết Quả Đăng Ký</h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>Tên đơn vị</th>
            <th>Tên cán bộ hướng dẫn</th>
            <th>Tên Giảng viên hướng dẫn</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tbody style="color:black">


              <tr>
                  <td> {{ $thucTap->getDataDonVi( "tenDonVi" ) }} </td>
                  <td> {{ $thucTap->getDataNguoiHuongDan( "ten" ) }} </td>
                  <td> {{ $thucTap->getDataGiangVien( "ten" ) }} </td>
                  <td>
                    <div class="btn_active">
                        <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit">
                            <i class="fas fa-edit icon_edit"></i>Sửa
                        </div>
                        <a href="{{ asset('sinh-vien/xoa-dang-ky') }}">
                          <div class="btn btn-danger btn_delete">
                              <i class="far fa-trash-alt icon_delete"></i>Xóa
                          </div>
                        </a>
                        <!-- The Modal -->
                          <div class="modal fade" id="md_Edit">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                      <h4 class="modal-title">Cập nhật đăng ký thực tập</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                          <form action="{{ asset('sinh-vien/cap-nhat-dang-ky-thuc-tap') }}" method="post">
                                            {{ csrf_field() }}

                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">Đơn vị:</span>
                                                  </div>
                                                  <select class="form-control" id="sel1" name="don-vi">
                                                    @foreach($donVi as $value)
                                                       <option value="{{ $value->getMaDonVi() }}">{{ $value->getTenDonVi() }}</option>
                                                    @endforeach
                                                  </select>
                                              </div>

                                              
                                      <!-- Modal footer -->
                                      <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Cập nhật</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                              </div>
                          </div> <!-- end modal -->
                    </div>
                </td>
              </tr>


        </tbody>
      </table>
      
    </div>
  </div>
</div>
@endif

 

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

    div#tableData_paginate {
      display: none;
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
        content: "Chọn ảnh";
    }
    </style>