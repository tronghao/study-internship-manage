@extends('template.app')

@section('title-page')
	Quản Trị - Admin
@endsection

@section('title-content-page')
	{{--Quản Trị--}} Thực Tập
@endsection

@section('title-content-page-link')
	{{ asset('admin/home') }}
@endsection

@section('copyright')
	Khoa Kỹ thuật và Công nghệ
@endsection

@section('css')
  <!-- jquery cho ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  
  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  
  <!-- CKEDITOR -->
  <script src=" {{ asset('public/admin/include/ckeditor/ckeditor.js') }} "></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('menu')

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Quản Trị
      </div>

	    <li class="nav-item">
        <a class="nav-link thong-bao-menu" href="#">
          <i class="fas fa-info-circle"></i>
          <span>Thông Báo</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-money"></i>
          <span>Kinh phí</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kinh phí:</h6>
            <a class="collapse-item kinh-phi-menu" href="#">Kinh phí hỗ trợ</a>
            <a class="collapse-item tong-kinh-phi-menu" href="#">Tổng kinh phí hỗ trợ</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link don-vi-menu" href="#">
          <i class="fas fa-building"></i>
          <span>Đơn Vị Thực Tập</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link duyet-user-menu" href="#">
          <i class="fas fa-users"></i>
          <span>User</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link danh-sach-thuc-tap-menu" href="#">
          <i class="fas fa-clipboard-list"></i>
          <span>Danh Sách thực tập</span></a>
      </li>

       <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Quản Lý
      </div>

      <li class="nav-item">
        <a class="nav-link hoc-vi-menu" href="#">
          <i class="fas fa-graduation-cap"></i>
          <span>Học vị</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link chuc-vu-menu" href="#">
          <i class="fas fa-user-tag"></i>
          <span>Chức vụ</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link nganh-menu" href="#">
          <i class="fas fa-school"></i>
          <span>Ngành</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link lop-menu" href="#">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Lớp</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Nhập/Xuất dữ liệu
      </div>

      <li class="nav-item">
        <a class="nav-link" href="{{ asset('admin/xuat-du-lieu-thuc-tap') }}">
          <i class="fas fa-file-download"></i>
          <span>Xuất dữ liệu thực tập</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-file-import"></i>
          <span>Nhập dữ liệu</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dữ liệu cần nhập:</h6>
            <a class="collapse-item nhap-nganh" href="#">Ngành</a>
            <a class="collapse-item nhap-lop" href="#">Lớp</a>
            <a class="collapse-item nhap-hoc-vi" href="#">Học vị</a>
            <a class="collapse-item nhap-chuc-vu" href="#">Chức vụ</a>
          </div>
        </div>
      </li>
  
      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <div class="sidebar-heading">
        Cấu hình
      </div>
      <li class="nav-item">
        <a class="nav-link cai-dat-menu" href="#">
          <i class="fas fa-fw fa-cog"></i>
          <span>Cài đặt</span></a>
      </li>

    <!-- my script -->
    <script>
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        $('.thong-bao-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/thong-bao') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })
        //$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

        //kinh phí hỗ trợ
        $('.kinh-phi-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/kinh-phi') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //tổng kinh phí hỗ trợ
        $('.tong-kinh-phi-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/tong-kinh-phi') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //Đơn vị thực tập
        $('.don-vi-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/don-vi') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //Duyệt User
        $('.duyet-user-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/danh-sach-user') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //Danh sách thực tập
        $('.danh-sach-thuc-tap-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/danh-sach-thuc-tap') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //Học vị
        $('.hoc-vi-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/hoc-vi') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //ngành
        $('.nganh-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/nganh') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //chức vụ
        $('.chuc-vu-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/chuc-vu') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //lớp
        $('.lop-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/lop') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //lớp
        $('.cai-dat-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/cai-dat') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //nhập Ngành
        $('.nhap-nganh').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/nhap-du-lieu/nganh') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //nhập lớp
        $('.nhap-lop').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/nhap-du-lieu/lop') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //nhập học vị
        $('.nhap-hoc-vi').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/nhap-du-lieu/hoc-vi') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //nhập chức vụ
        $('.nhap-chuc-vu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('admin/nhap-du-lieu/chuc-vu') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

    </script>
@endsection

@section('user-name')
	Quản Trị Viên
@endsection

@section('src-img')
	https://weplus.vn/wp-content/uploads/avatars/1/5d6dee5365c67-bpthumb.png
@endsection

@section('content')
  @if(isset($info))    
    <script>
        alert("{{ $info }}");
    </script>
  @endif
  @if(isset($menu))
      @if($menu == 'kinhphi')
        <script>
            var element = document.getElementsByClassName("kinh-phi-menu");
            element[0].click();
        </script>
      @elseif ($menu == 'thongbao')
        <script>
              var element = document.getElementsByClassName("thong-bao-menu");
              element[0].click();
        </script>
      @elseif ($menu == 'duyet-user')
        <script>
              var element = document.getElementsByClassName("duyet-user-menu");
              element[0].click();
        </script>
      @elseif ($menu == 'don-vi')
        <script>
              var element = document.getElementsByClassName("don-vi-menu");
              element[0].click();
        </script>
      @elseif ($menu == 'danh-sach-thuc-tap')
        <script>
              var element = document.getElementsByClassName("danh-sach-thuc-tap-menu");
              element[0].click();
        </script>
       @elseif ($menu == 'hoc-vi')
        <script>
              var element = document.getElementsByClassName("hoc-vi-menu");
              element[0].click();
        </script>
        @elseif ($menu == 'nganh')
        <script>
              var element = document.getElementsByClassName("nganh-menu");
              element[0].click();
        </script>
        @elseif ($menu == 'chuc-vu')
        <script>
              var element = document.getElementsByClassName("chuc-vu-menu");
              element[0].click();
        </script>
        @elseif ($menu == 'lop')
        <script>
              var element = document.getElementsByClassName("lop-menu");
              element[0].click();
        </script>
        @elseif ($menu == 'cai-dat')
        <script>
              var element = document.getElementsByClassName("cai-dat-menu");
              element[0].click();
        </script>
      @endif
  @else
    <script>
          var element = document.getElementsByClassName("duyet-user-menu");
          element[0].click();
    </script>
  @endif
@endsection