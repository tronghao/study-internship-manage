<!doctype html>
<html lang="en">
  <head>
    <title>Thông tin cán bộ đơn vị</title>
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
    
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5 my_shadow" style="padding: 5%">
            <form action=" {{ asset('thong-tin-can-bo') }}/{{ $email }}" method="post" class="needs-validation">
				{{ csrf_field() }}
				<h1 style="text-align: center">THÔNG TIN CÁN BỘ ĐƠN VỊ</h1>
				<div class="form-group">
					<label for="sdt_nhd">Số điện thoại</label>
					<input type="text" class="form-control" name="sdt" id="sdt_nhd" placeholder="Nhập số điện thoại" required pattern="(^0[0-9]{9,10})+">
					<div class="invalid-feedback">*Vui lòng nhập số điện thoại</div>
				</div>

				<div class="form-group">
			    	<label for="chon_donvi">Chọn đơn vị:</label><br>
			    	<select name="maDonVi" id="chon_donvi" class="custom-select" required>
			    		@foreach ($duLieuDonVi as $value)
			    			<option value="{{ $value->getMaDonVi() }}">{{ $value->getTenDonVi() }}</option>
			    		@endforeach
			    	</select>
			    	<div class="invalid-feedback">*Vui lòng chọn đơn vị</div>
			    </div>

			    <div class="form-group">
			    	<label for="chon_chucvu">Chọn chức vụ:</label><br>
			    	<select name="maChucVu" id="chon_chucvu" class="custom-select" required>
			    		@foreach ($duLieuChucVu as $value)
			    			<option value="{{ $value->getMaChucVu() }}">{{ $value->getTenChucVu() }}</option>
			    		@endforeach
			    	</select>
			    	<div class="invalid-feedback">*Vui lòng chọn chức vụ</div>
			    </div>

			    <div class="form-group">
			    	<label> Lời giới thiệu </label><br>
					<textarea class="form-control" rows="10" name="loiGioiThieu" id="textarea" placeholder="Nhập lời giới thiệu."></textarea>
				</div>

			    <div class="form-group-button" style="text-align: right;">
			    	<button type="submit" class="btn btn-primary">Gửi</button>		    	
				</div>
			</form>	 
        </div>


         
    </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
