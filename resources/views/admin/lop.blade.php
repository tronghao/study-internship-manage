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
            Thêm lớp
        </button>
    </div>
</div>
<br>

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Lớp</h6>
  </div>
  @if( count($danhSachLop) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Mã lớp</th>
            <th>Tên lớp</th>
            <th>Tên ngành</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tfoot style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Mã lớp</th>
            <th>Tên lớp</th>
            <th>Tên ngành</th>
            <th style="width: 15%;"></th>
          </tr>
        </tfoot>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($danhSachLop as $value)
              <tr>
                  <td> {{ $i }} </td>
                  <td> {{ $value->getMaLop() }} </td>
                  <td> {{ $value->getTenLop() }} </td>
                  <td> {{ $value->getDataNganh( 'ten' ) }} </td>
                  <td>
                    <div class="btn_active">
                        <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit_{{ $i }}">
                            <i class="fas fa-edit icon_edit"></i>Sửa
                        </div>
                        <a href="{{ asset('admin/xoa-lop/'.$value->getMaLop()) }}">
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
                                        <h4 class="modal-title">Cập nhật lớp</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="{{ asset('admin/sua-lop/'.$value->getMaLop() ) }}" method="post">
                                              {{ csrf_field() }}
                                                <div class="form-group" style="text-align: left;">
                                                  <label for="maLop">Mã Lớp:</label>
                                                  <input type="text" class="form-control" id="maLop" name="ma-lop" required value=" {{ $value->getMaLop() }} ">
                                                </div> 
                                                <div class="form-group" style="text-align: left;">
                                                  <label for="usr">Tên Lớp:</label>
                                                  <input type="text" class="form-control" id="usr" name="ten-lop" required value=" {{ $value->getTenLop() }} ">
                                                </div>                  
                                                <div class="form-group" style="text-align: left;">
                                                  <label for="sel1">Ngành:</label>
                                                  <select class="form-control" id="sel1" name="ma-nganh">
                                                    @foreach($danhSachNganh as $value2)
                                                      @if( $value->getDataNganh( 'ten' ) == $value2->getTenNganh() )
                                                        <option value="{{ $value2->getMaNganh() }}" selected> {{ $value2->getTenNganh() }} </option>
                                                      @else
                                                        <option value="{{ $value2->getMaNganh() }}"> {{ $value2->getTenNganh() }} </option>
                                                      @endif
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
                    <h4 class="modal-title">Thêm lớp</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ asset('admin/them-lop') }}" method="post">
                          {{ csrf_field() }}
                            <div class="form-group">
                              <label for="maLop">Mã Lớp:</label>
                              <input type="text" class="form-control" id="maLop" name="ma-lop" required>
                            </div> 
                            <div class="form-group">
                              <label for="usr">Tên Lớp:</label>
                              <input type="text" class="form-control" id="usr" name="ten-lop" required>
                            </div>                  
                            <div class="form-group">
                              <label for="sel1">Ngành:</label>
                              <select class="form-control" id="sel1" name="ma-nganh">
                                @foreach($danhSachNganh as $value)
                                  <option value="{{ $value->getMaNganh() }}"> {{ $value->getTenNganh() }} </option>
                                @endforeach
                              </select>
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