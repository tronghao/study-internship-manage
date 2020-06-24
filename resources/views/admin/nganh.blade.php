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
            Thêm ngành
        </button>
    </div>
</div>
<br>

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ngành</h6>
  </div>
  @if( count($danhSachNganh) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Mã ngành</th>
            <th>Tên ngành</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tfoot style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Mã ngành</th>
            <th>Tên ngành</th>
            <th style="width: 15%;"></th>
          </tr>
        </tfoot>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($danhSachNganh as $value)
              <tr>
                  <td> {{ $i }} </td>
                  <td> {{ $value->getMaNganh() }} </td>
                  <td> {{ $value->getTenNganh() }} </td>
                  <td>
                    <div class="btn_active">
                        <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit_{{ $i }}">
                            <i class="fas fa-edit icon_edit"></i>Sửa
                        </div>
                        <a href="{{ asset('admin/xoa-nganh/'.$value->getMaNganh()) }}">
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
                                      <h4 class="modal-title">Cập nhật ngành</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                          <form action="{{ asset('admin/sua-nganh/'.$value->getMaNganh()) }}" method="post">
                                            {{ csrf_field() }}
                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">Mã ngành:</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="ma-nganh" required value="{{ $value->getMaNganh() }}">
                                              </div>

                                              <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                      <span class="input-group-text">Tên ngành:</span>
                                                  </div>
                                                  <input type="text" class="form-control" name="ten-nganh" required value="{{ $value->getTenNganh() }}">
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
                    <h4 class="modal-title">Thêm ngành</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ asset('admin/them-nganh') }}" method="post">
                          {{ csrf_field() }}
                           <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mã Ngành:</span>
                                </div>
                                <input type="text" class="form-control" name="ma-nganh" required>
                            </div>    
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tên ngành:</span>
                                </div>
                                <input type="text" class="form-control" name="ten-nganh" required>
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