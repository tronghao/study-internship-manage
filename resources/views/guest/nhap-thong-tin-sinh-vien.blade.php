<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin sinh viên</title>
	<!--Boostrap CSS-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	.flex{

		background-color: #99ff99;
		padding-top: 50px;
 		padding-right: 80px;
 		padding-bottom: 30px;
  		padding-left: 80px;
	}
	.container {
		border-style: hidden;
		border-width: 50px 20px;
		font-size: 100%;
		margin: 0 auto;
		background-color: #ccffff;

	}
	h1{
		padding-top: 20px;
		color: red;
		text-align: center;
	}
	.form-group{
		width: 800px;
		padding-left:200px;
	}
	.form-group-button{
		padding-left:650px; 
		padding-bottom: 20px
	}

</style>
<body>
	<div class="flex">
		<div class="container">
			<form action=" {{ asset('thong-tin-sinh-vien') }}/{{ $email }}" method="post" class="needs-validation" novalidate>
				{{ csrf_field() }}
				<h1>THÔNG TIN SINH VIÊN</h1>

				<div class="form-group">
					<label for="sdt_sv">Số điện thoại</label>
					<input type="text" class="form-control" name="sdt" id="sdt_sv" placeholder="Nhập số điện thoại" required>
					<div class="invalid-feedback">*Vui lòng nhập số điện thoại</div>
				</div>

				<div class="form-group">
			    	<label for="chon_lop">Chọn lớp:</label><br>
			    	<select name="maLop" id="chon_lop" class="custom-select" required>
			    		@foreach ($duLieuLop as $value)
			    			<option value="{{ $value->getMaLop() }}">{{ $value->getMaLop() }} - {{ $value->getTenLop() }}</option>
			    		@endforeach
			    	</select>
			    	<div class="invalid-feedback">*Vui lòng chọn lớp</div>
			    </div>

			    <div class="form-group">
			    	<label> Lời giới thiệu </label><br>
					<textarea cols="80" rows="10" name="loiGioiThieu" id="textarea" placeholder="Nhập lời giới thiệu."></textarea>
				</div>

			    <div class="form-group-button">
			    	<button type="submit" class="btn btn-primary">Gửi</button>		    	
				</div>
			</form>	
		</div>		
</body>
</html>