@extends('template.app')

@section('title-page')
	Quản Trị - Admin
@endsection

@section('title-content-page')
	{{--Quản Trị--}} Thực Tập
@endsection

@section('title-content-page-link')
	{{ asset('/') }}
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
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Thông Báo</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link kinh-phi-menu" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Kinh Phí</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link don-vi-menu" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Đơn Vị Thực Tập</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link duyet-user-menu" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>User</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link danh-sach-thuc-tap-menu" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Danh Sách thực tập</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
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

        
    </script>
@endsection

@section('user-name')
	Quản Trị Viên
@endsection

@section('src-img')
	https://weplus.vn/wp-content/uploads/avatars/1/5d6dee5365c67-bpthumb.png
@endsection

@section('content')
	abc
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
      @endif
  @endif

  @if(isset($info))    
    <script>
        alert("{{ $info }}");
    </script>
  @endif
@endsection