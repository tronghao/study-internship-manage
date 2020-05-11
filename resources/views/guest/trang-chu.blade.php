<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý thực tập tốt nghiệp</title>

    <link rel="stylesheet" href="{{ asset('public/font/fontawesome-free-5.13.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/css_bs/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/css_bs/css/modern-business.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
        <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top bg-dark">
        <div class="container">
            <a href="#"><img hidden src="{{ asset('public/img/logo_tvu.png') }}" alt="Logo TVU" class="container-img" ></a>
            <a class="navbar-brand" href="index.html">Quản lý thực tập tốt nghiệp</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Đăng nhập</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Đăng ký</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Trợ giúp</a>
                </li>
            
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active carousel-my" style="background-image:  url(https://www.tvu.edu.vn/wp-content/uploads/2019/07/tvu_trencao_dhtv.png)">
            <!-- <div class="carousel-caption d-none d-md-block">
                <h3>First Slide</h3>
                <p>This is a description for the first slide.</p>
            </div> -->
            </div>

            <div>
                <img src="{{ asset('public/img/logo_tvu.png') }}" alt="logo TVU" class="container__gioithieu_img">
            </div>
          
            <div class="container__gioithieu">
                <h1 class="my-4 container__gioithieu_ani">THỰC TẬP SET</h1>
                <h3 class="container__gioithieu_ani" style="background: rgb(169,165,178,0.6)">Công tác quản lý thực tập sẽ dễ dàng hơn <br> và sinh viên sẽ nắm thông tin nhanh nhất</h3>
             </div>
      
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <!-- <div class="carousel-item" style="background-image: url('https://cicet.tvu.edu.vn/images/Dai-hoc-Tra-Vinh-Dai-hoc-1.jpeg')"> -->
            <!-- <div class="carousel-caption d-none d-md-block">
                <h3>Second Slide</h3>
                <p>This is a description for the second slide.</p>
            </div> -->
            <!-- </div> -->
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <!-- <div class="carousel-item" style="background-image:  url(https://ktcn.tvu.edu.vn/public/ht96_image/slider/z8hd_1_BoHoKhoa-min.jpg)"> -->
            <!-- <div class="carousel-caption d-none d-md-block">
                <h3>Third Slide</h3>
                <p>This is a description for the third slide.</p>
            </div> -->
            <!-- </div> -->
            
        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
        </div>
    </header>

     <!-- Banner item -->
     <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6 banner_item">
                <div class="banner_list">
                    <a href="#"><img class="banner_item-img" src="{{ asset('public/img/nha_truong.jpg') }}" alt=""></a>
                    <div class="banner_body">
                        <h4 class="banner_title">
                            <a href="#">Nhà trường</a>
                        </h4>
                        <p class="banner_text">
                            Viết nội dung vào đây
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 banner_item">
                <div class="banner_list h-100">
                    <a href="#"><img class="banner_item-img" src="{{ asset('public/img/sinh_vien.jpeg') }}" alt=""></a>
                    <div class="banner_body">
                        <h4 class="banner_title">
                            <a href="#">Sinh viên</a>
                        </h4>
                        <p class="banner_text">
                            Viết nội dung vào đây
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 banner_item">
                <div class="banner_list banner_list_dv h-100">
                    <a href="#"><img class="banner_item-img" src="{{ asset('public/img/don_vi_thuc_tap.jpg') }}" alt=""></a>
                    <div class="banner_body">
                        <h4 class="banner_title">
                            <a href="#">Đơn vị thực tập</a>
                        </h4>
                        <p class="banner_text">
                            Viết nội dung vào đây
                        </p>
                    </div>
                </div>
            </div>
        </div>
     </div>
    <!-- End Banner item -->
     

    <!--Quy trình thực tập-->
    <div class="container qttt" data-aos="fade-right" data-aos-duration="500">
        <div class="row">
            <div class="col-md-12 qttt-tittle">Quy Trình Thực Tập</div>
            <div class="col-md-12">
                <p class="qttt-description">Sinh viên xem kỹ để biết rõ về quy trình thực tập</p>
            </div>
            <div class="col-md-12">
                <figure>
                    <div class="qttt-ngat-dong">
                        <img class="qttt-img-ngat-dong"  src="http://kitgreen.jwsthemeswp.com/wp-content/uploads/2018/01/line-title.png" alt="img ngắt dòng">
                    </div>
                </figure>
            </div>
        </div> <!-- Kết thúc row title-->

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-content">
                <div class="row">
                    <div class="col-3 col-sm-12 col-md-4">
                        <img src="http://kitgreen.jwsthemeswp.com/wp-content/uploads/2018/01/sevice6.jpg">
                    </div>
                    <div class="mobile-content col-9 col-sm-12 col-md-8">
                        <div>
                            <div class="title">
                                <h6 class="qttt-content-title">Bước 1</a></h6>
                            </div>
                            <div class="qttt-content-mo-ta">
                                <p class="qttt-content-mo-ta-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida maximus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Kết thúc bước 1-->

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-content">
                <div class="row">
                    <div class="col-3 col-sm-12 col-md-4">
                        <img src="http://kitgreen.jwsthemeswp.com/wp-content/uploads/2018/01/sevice4.jpg">
                    </div>
                    <div class="mobile-content col-9 col-sm-12 col-md-8">
                        <div>
                            <div class="title">
                                <h6 class="qttt-content-title">Bước 2</a></h6>
                            </div>
                            <div class="qttt-content-mo-ta">
                                <p class="qttt-content-mo-ta-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida maximus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Kết thúc bước 2-->

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-content">
                <div class="row">
                    <div class="col-3 col-sm-12 col-md-4">
                        <img src="http://kitgreen.jwsthemeswp.com/wp-content/uploads/2018/01/sevice5.jpg">
                    </div>
                    <div class="mobile-content col-9 col-sm-12 col-md-8">
                        <div>
                            <div class="title">
                                <h6 class="qttt-content-title">Bước 3</a></h6>
                            </div>
                            <div class="qttt-content-mo-ta">
                                <p class="qttt-content-mo-ta-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida maximus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Kết thúc bước 3-->           

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-content">
                <div class="row">
                    <div class="col-3 col-sm-12 col-md-4">
                        <img src="http://kitgreen.jwsthemeswp.com/wp-content/uploads/2018/01/sevice3.jpg">
                    </div>
                    <div class="mobile-content col-9 col-sm-12 col-md-8">
                        <div>
                            <div class="title">
                                <h6 class="qttt-content-title">Bước 4</a></h6>
                            </div>
                            <div class="qttt-content-mo-ta">
                                <p class="qttt-content-mo-ta-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida maximus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Kết thúc bước 4-->

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-content">
                <div class="row">
                    <div class="col-3 col-sm-12 col-md-4">
                        <img src="http://kitgreen.jwsthemeswp.com/wp-content/uploads/2018/01/sevice2.jpg">
                    </div>
                    <div class="mobile-content col-9 col-sm-12 col-md-8">
                        <div>
                            <div class="title">
                                <h6 class="qttt-content-title">Bước 5</a></h6>
                            </div>
                            <div class="qttt-content-mo-ta">
                                <p class="qttt-content-mo-ta-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida maximus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Kết thúc bước 5-->

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-content">
                <div class="row">
                    <div class="col-3 col-sm-12 col-md-4">
                        <img src="http://kitgreen.jwsthemeswp.com/wp-content/uploads/2018/01/sevice1.jpg">
                    </div>
                    <div class="mobile-content col-9 col-sm-12 col-md-8">
                        <div>
                            <div class="title">
                                <h6 class="qttt-content-title">Bước 6</a></h6>
                            </div>
                            <div class="qttt-content-mo-ta">
                                <p class="qttt-content-mo-ta-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis gravida maximus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Kết thúc bước 6-->
        </div> 
    </div>
    <!-- Kết thúc quy trình thực tập-->
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-4 notification">
                <div class="notification_list h-100">
                    <a href="#"><img class="notification_item-img" src="{{ asset('public/img/don_vi_thuc_tap.jpg') }}" alt=""></a>
                    <div class="notification_body">
                        <h4 class="notification_item-title">
                            <a href="#">Thông báo về việc nộp kết quả thực tập</a>
                        </h4>
                        <p class="notification_item-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse quia rerum iusto odit explicabo in distinctio veritatis ea fugit. Esse cupiditate architecto ullam voluptates enim alias aliquid doloremque odit.
                        </p>
                    </div>
                    <div class="btn btn-danger notification_item-btn">Xem thêm</div>
                </div>
            </div>
            <div class="col-lg-4 notification">
                <div class="notification_list h-100">
                    <a href="#"><img class="notification_item-img" src="{{ asset('public/img/don_vi_thuc_tap.jpg') }}" alt=""></a>
                    <div class="notification_body">
                        <h4 class="notification_item-title">
                            <a href="#">Thông báo về việc nộp kết quả thực tập</a>
                        </h4>
                        <p class="notification_item-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse quia rerum iusto odit explicabo in distinctio veritatis ea fugit. Esse cupiditate architecto ullam voluptates enim alias aliquid doloremque odit.
                        </p>
                    </div>
                    <div class="btn btn-danger notification_item-btn">Xem thêm</div>
                </div>
            </div>
            <div class="col-lg-4 notification">
                <div class="notification_list h-100">
                    <a href="#"><img class="notification_item-img" src="{{ asset('public/img/don_vi_thuc_tap.jpg') }}" alt=""></a>
                    <div class="notification_body">
                        <h4 class="notification_item-title">
                            <a href="#">Thông báo về việc nộp kết quả thực tập</a>
                        </h4>
                        <p class="notification_item-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque esse quia rerum iusto odit explicabo in distinctio veritatis ea fugit. Esse cupiditate architecto ullam voluptates enim alias aliquid doloremque odit.
                        </p>
                    </div>
                    <div class="btn btn-danger notification_item-btn">Xem thêm</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <!-- <footer class="py-5 bg-dark my_footer">
        <div class="container">
            <p class="m-0 text-center text-white my_footer-text">Khoa Kỹ thuật & Công nghệ - Bộ môn Công Nghệ Thông Tin</p>
        </div>
    </footer> -->
    <div class="container-fluid my_footer">
        <p class="my_footer-text">Khoa Kỹ thuật & Công nghệ - Bộ môn Công Nghệ Thông Tin</p>
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
                                    <form class="form-signin">
                                        <div class="form-label-group">
                                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                            <label for="inputEmail">Địa chỉ email</label>
                                        </div>
                        
                                        <div class="form-label-group">
                                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                            <label for="inputPassword">Mật khẩu</label>
                                        </div>
                        
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                          
                                            <a href="#" class="form-label-link">Quên mật khẩu?</a>
                                        </div>
                
                                        <button class="btn btn-lg btn-primary btn-block text-uppercase btn-my-dang_nhap" type="submit">Đăng nhập</button>
                                        <hr class="my-4">
                                        <p class="form-text">Lưu ý: Giảng viên và sinh viên đăng nhập bằng mail của trường</p>
                                        <button class="btn btn-lg btn-google btn-block text-uppercase btn-my-gmail" type="submit" style="background-color: #ea4335; color: white;">                                           
                                            <i class="fab fa-google mr-2"></i> 
                                            Đăng nhập với Google
                                        </button>
                                    </form>
                                </div>
                                <!-- </div>
                            </div>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
      
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
        AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
      </script>
    <script src="/css/css_bs/vendor/jquery/jquery.min.js"></script>
    <script src="/css/css_bs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>