

<div class="container_content">
      <!-- Header content -->
    <div class="header_content">
    </div>
    <div class="header_button">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#md_Edit">
            <i class="fas fa-edit"></i>
            Cập nhật kinh phí
        </button>
    </div>
</div>
<br>

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Kinh phí hỗ trợ</h6>
  </div>
  <div class="card-body">
    <p>Kinh phí hỗ trợ hiện tại là: <span style="color: red; font-size:20px">{{ number_format($duLieuKinhPhi["soTien"], 0, ',', '.')}}</span>đ/Km</p>
    
  </div>
</div>


  <!-- Modal Cập Nhật -->
    <div class="modal fade" id="md_Edit">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title md_text_tb">Cập nhật kinh phí</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form class="md-form" action="{{ asset('admin/cap-nhat-kinh-phi') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="modal-body_noidung">
                        <h4 class="md_text">Số tiền</h4>
                        <input type="number" class="form-control" name="soTien" value="{{ $duLieuKinhPhi['soTien'] }}" min="0" max="10000000">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Cập nhật</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
                </form>
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

    div#tableData_paginate {
        display: none;
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
        content: "Chọn ảnh";
    }
    </style>