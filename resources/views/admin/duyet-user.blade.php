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
    <h6 class="m-0 font-weight-bold text-primary">Danh sách User chưa được duyệt</h6>
  </div>
  @if( count($danhsachUserChuaDuyet) != 0 )
  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Họ Tên</th>
            <th>Lời Giới Thiệu</th>
            <th style="width: 15%;"></th>
          </tr>
        </thead>
        <tfoot style="color:black; text-align: center;" >
          <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Họ Tên</th>
            <th>Lời Giới Thiệu</th>
            <th style="width: 15%;"></th>
          </tr>
        </tfoot>
        <tbody style="color:black">
          @php $i=1; @endphp
            @foreach($danhsachUserChuaDuyet as $value)
              <tr>
                  <td> {{ $i }} </td>
                  <td> {{ $value->getEmail() }} </td>
                  <td> {{ $value->getHoTen() }} </td>
                  <td> {{ $value->getLoiGioiThieu() }} </td>
                  <td>
                    <div class="btn_active">
                        <a href="{{ asset('admin/duyet-user/'.$value->getId()) }}">
                          <div class="btn btn-success btn_edit">
                            <i class="fas fa-edit icon_edit"></i>Duyệt
                          </div>
                        </a>
                        <a href="{{ asset('admin/xoa-user/'.$value->getId()) }}">
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

    div#tableData_paginate {
        display: none;
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
        content: "Chọn ảnh";
    }
    </style>