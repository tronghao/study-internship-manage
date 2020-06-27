<script>
  $(document).ready( function () {
    $('#tableData').DataTable();
} );
</script>

<div class="container_content">
      <!-- Header content -->
    <div class="header_content">
    </div>
    <div class="header_button">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#md_Add">
            <i class="fas fa-plus-circle content_icon-plus"></i>
            Thêm thông báo
        </button>
    </div>
</div>
<br>

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thông Báo</h6>
  </div>
  @if( count($duLieuThongBao) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Nội dung trích dẫn</th>
            <th style="width: 20%;">Hình ảnh đại diện</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tfoot style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Nội dung trích dẫn</th>
            <th style="width: 20%;">Hình ảnh đại diện</th>
            <th style="width: 15%;"></th>
          </tr>
        </tfoot>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($duLieuThongBao as $value)
              <tr>
                  <td> {{ $i }} </td>
                  <td> {{ $value->getTitle() }} </td>
                  <td> {{ $value->getQuote() }} </td>
                  <td> 
                    <img width="100%" src="{{ $value->getImg() }} ">
                  </td>
                  <td>
                    <div class="btn_active">
                        <div class="btn btn-success btn_edit" data-toggle="modal" data-target="#md_Edit{{ $value->getId() }}">
                          <i class="fas fa-edit icon_edit"></i>Sửa
                        </div>

                        <a href="{{ asset('admin/xoa-thong-bao/'.$value->getId()) }}">
                          <div class="btn btn-danger btn_delete">
                              <i class="far fa-trash-alt icon_delete"></i>Xóa 
                          </div>
                        </a>
                        
                        <!-- Modal Edit -->
                        <div class="modal fade" id="md_Edit{{ $value->getId() }}">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title md_text_tb">Cập nhật thông báo</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <form class="md-form" enctype="multipart/form-data"  action="{{ asset('admin/sua-thong-bao/'.$value->getId()) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="modal-body_noidung">
                                            <h4 class="md_text">Tiêu đề</h4>
                                            <input type="text" class="form-control" name="tieu-de" value="{{ $value->getTitle() }}">
                                        </div>
                                        <br>
                                        <div class="modal-body_noidung">
                                            <h4 class="md_text">Nội dung</h4>
                                            <textarea class="form-control" rows="3" name="noi-dung" id="{{ $value->getId() }}">{{ $value->getContent() }}"</textarea>
                                            <script>CKEDITOR.replace('{{ $value->getId() }}');</script>
                                        </div>
                                        <br>    
                                        <div class="form-group modal-body_trichdan">
                                            <h4 class="md_text" >Trích dẫn</h4>
                                            <textarea class="form-control" rows="3" name="trich-dan">{{ $value->getQuote() }}</textarea>
                                        </div>
                                        <br>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept=".jpg,.png">
                                          <label class="custom-file-label" for="customFile">Chọn ảnh đại diện</label>
                                        </div>
                                        <script>
                                        // Add the following code if you want the name of the file appear on select
                                        $(".custom-file-input").on("change", function() {
                                          var fileName = $(this).val().split("\\").pop();
                                          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                        });
                                        </script>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" >Cập nhật</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end model edit -->

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


  <!-- Modal Add -->
    <div class="modal fade" id="md_Add">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title md_text_tb">Thêm thông báo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form class="md-form" enctype="multipart/form-data"  action="{{ asset('admin/them-thong-bao') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body" style="text-align: center; font-family: serif; font-style: 29px">
                    <div class="modal-body_noidung">
                        <h4 class="md_text">Tiêu đề</h4>
                        <input type="text" class="form-control" name="tieu-de">
                    </div>
                    <br>
                    <div class="modal-body_noidung">
                        <h4 class="md_text">Nội dung</h4>
                        <textarea class="form-control" rows="3" name="noi-dung" id="noi-dung"></textarea>
                        <script>CKEDITOR.replace('noi-dung');</script>
                    </div>
                    <br>    
                    <div class="form-group modal-body_trichdan">
                        <h4 class="md_text">Trích dẫn</h4>
                        <textarea class="form-control" rows="3" name="trich-dan"></textarea>
                    </div>
                    <br>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept=".jpg,.png">
                      <label class="custom-file-label" for="customFile">Chọn ảnh đại diện</label>
                    </div>
                    <script>
                    // Add the following code if you want the name of the file appear on select
                    $(".custom-file-input").on("change", function() {
                      var fileName = $(this).val().split("\\").pop();
                      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                    });
                    </script>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
                </form>
            </div>
        </div>
    </div> <!-- end model add -->

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