<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Cài đặt</h6>
  </div>
  <div class="card-body">		
		<form action="{{ asset('admin/cap-nhat-cai-dat') }}" method="post">
			{{ csrf_field() }}
			<!-- Rounded switch -->
			<span class="title-slider">Cho phép đăng ký: </span>
			<label class="switch" id="dang-ky">
				@if( $choPhepDangKy )
			  		<input type="checkbox" checked name="dang-ky">
			  	@else
					<input type="checkbox" name="dang-ky">
			  	@endif
			  <span class="slider round"></span>
			</label>
			<br><br>

			<span class="title-slider">Cho phép chấm điểm: </span>
			<label class="switch">
				@if( $choPhepChamDiem )
			  		<input type="checkbox" checked name="cham-diem">
			  	@else
					<input type="checkbox" name="cham-diem">
			  	@endif
			  <span class="slider round"></span>
			</label>
			<br><br>
			<button class="btn btn-primary" type="submit"> Cập nhật </button>
		</form>
	</div>
</div>

<style>
	/* The switch - the box around the slider */
	.title-slider {
		line-height: 2.5;
	}

	label#dang-ky {
	    margin-left: 21px;
	}
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	/* Hide default HTML checkbox */
	.switch input {
	  opacity: 0;
	  width: 0;
	  height: 0;
	}

	/* The slider */
	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
</style>