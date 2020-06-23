@extends('template.app')

@section('title-page')
	Quản Trị - Sinh Viên
@endsection

@section('title-content-page')
	Thực Tập
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
        <a class="nav-link kinh-phi-menu" href="#">
          <i class="fa fa-money"></i>
          <span>Kinh phí hỗ trợ</span></a>
      </li>

	   <li class="nav-item">
        <a class="nav-link dang-ky-menu" href="#">
          <i class="fa fa-user-circle"></i>
          <span>Đăng ký thực tập</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link diem-menu" href="#">
          <i class="fa fa-hourglass-start" aria-hidden="true"></i>
          <span>Xem điểm</span></a>
      </li>

      


    <!-- my script -->
    <script>
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        $('.dang-ky-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('sinh-vien/dang-ky-thuc-tap') }}',
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
                url: '{{ URL::to('sinh-vien/kinh-phi') }}',
                data: {
                    '': $value
                },
                success:function(data){
                    $('.content-ajax').html(data);
                }
            });
        })

        //diem
        $('.diem-menu').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('sinh-vien/xem-diem') }}',
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
	{{ $userData->getHoTen() }}
@endsection

@section('src-img')
	{{ $userData->getAnhDaiDien() }}
@endsection

@section('content')

	@if(isset($info))
	  <script>
	    alert("{{ $info }}");
	  </script>
	@endif

  @if(isset($menu))
      @if($menu == 'dang-ky')
        <script>
            var element = document.getElementsByClassName("dang-ky-menu");
            element[0].click();
        </script>
      @elseif ($menu == 'diem')
        <script>
              var element = document.getElementsByClassName("diem-menu");
              element[0].click();
        </script>
      @elseif ($menu == 'kinh-phi')
        <script>
              var element = document.getElementsByClassName("kinh-phi-menu");
              element[0].click();
        </script>
      @endif
  @else
      <script>
            var element = document.getElementsByClassName("kinh-phi-menu");
            element[0].click();
      </script>
  @endif
@endsection