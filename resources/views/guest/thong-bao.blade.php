<!doctype html>
<html lang="en">
  <head>
    <title>Trang thông báo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('public/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">




    
    <!-- Link file -->
    <link rel="stylesheet" href="{{ asset('public/css/thongbao.css') }}">
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light static-top mb-5 shadow my_navbar bg-dark">
        <div class="container">
        <a class="navbar-brand my_navbar-brand" href="#">Quản lý thực tập tốt nghiệp</a>
        <button class="navbar-toggler my_navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link my_nav-link" href="{{ asset('/') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a id="dang-nhap" class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Đăng nhập</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
  
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5 my_shadow">
            <div class="card-body p-5">
                <h3 class="font-weight-light-bold" style="margin-bottom: 30px"> {{ $thongBaoItem->getTitle() }} </h3>
                @php echo $thongBaoItem->getContent() @endphp
                <div style="height: 500px"></div>
                
            </div>
            <div class="container-fluid my_footer">
                <p class="my_footer-text">Khoa Kỹ thuật & Công nghệ - Bộ môn Công Nghệ Thông Tin</p>
            </div> 
        </div>


         
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <!-- <h4 class="modal-title">Đăng nhập</h4> -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                    <!-- <div class="container"> -->
                        <!-- <div class="row"> -->
                            <!-- <div class="col-sm-9 col-md-7 col-lg-5 mx-auto"> -->
                                <!-- <div class="card card-signin my-5"> -->
                                <div class="card-body">
                                    <h5 class="card-title text-center" style="font-size: 2rem; margin-bottom: 25px;">Đăng nhập</h5>
                                    <form class="form-signin" action="{{ asset('login') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-label-group">
                                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                                            <label for="inputEmail">Địa chỉ email</label>
                                        </div>
                                        <div class="form-label-group">
                                            <input type="password" id="inputPassword" name ="password" class="form-control" placeholder="Password" required>
                                            <label for="inputPassword">Mật khẩu</label>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>Tài khoản hoặc mật khẩu không đúng</strong>
                                            </span>
                                            <script>
                                                document.getElementById('dang-nhap').click();
                                            </script>
                                        @endif
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                          
                                            <a href="#" class="form-label-link">Quên mật khẩu?</a>
                                        </div>
                
                                        <button class="btn btn-lg btn-primary btn-block text-uppercase btn-my-dang_nhap" type="submit">Đăng nhập</button>
                                        <hr class="my-4">
                                        <p class="form-text">Lưu ý: Giảng viên và sinh viên đăng nhập bằng mail của trường</p>
                                        <a href="{{ $loginURL }}" class="btn btn-lg btn-google btn-block text-uppercase btn-my-gmail" style="background-color: #ea4335; color: white;">                                           
                                            <i class="fab fa-google mr-2"></i> 
                                            Đăng nhập với Google
                                        </a>
                                    </form>
                                </div>
                                <!-- </div>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>