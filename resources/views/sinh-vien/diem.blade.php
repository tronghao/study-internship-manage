<script>
  $(document).ready( function () {
      $('#tableData').DataTable();
  });
</script>

@if( count($dataDiem) == 0 )  
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thông tin điểm</h6>
  </div>
  <div class="card-body">
        <p> Chưa có điểm thực tập của bạn </p>  
  </div>
</div>

@else

<!-- Table -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Thông tin điểm</h6>
  </div>

  <div class="card-body">
    <div class="table-responsive">
     <table class="table table-bordered" id="tableData" width="100%" cellspacing="0">
        <thead style="color:black; text-align: left;" >
          <tr>
            <th style="width: 20%;"> Họ tên người chấm </th>
            <th style="width: 10%;">Điểm</th>
            <th>Đánh giá</th>
          </tr>
        </thead>
        <tbody style="color:black">

              @foreach($dataDiem as $value)
                <tr>
                    <td> {{ $value->getDataNguoiCham( "ten" ) }} </td>
                    <td> {{ $value->getDiem() }} </td>
                    <td> {{ $value->getNhanXet() }} </td>
                </tr>
              @endforeach


        </tbody>
      </table>
      
    </div>

    <br>
    <b><p style="text-align: right;">Điểm Trung Bình: <span style="color: red; font-size: 20px">{{ $diemTB }} </span></p><b>
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