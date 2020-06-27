<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Nhập dữ liệu từ excel</h6>
  </div>
  <div class="card-body">		
		<form class="md-form" action="{{ asset('admin/nhap-du-lieu/'.$table) }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="file-field">
			    <a class="btn-floating purple-gradient mt-0 float-left">
			      <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
			      <input type="file" accept=".xls,.xlsx" name="fileToUpload">
			    </a>
			  </div>
			<br><br>
			<p> Lưu ý: file phải bắt đầu dữ liệu từ dòng 2 có định dạng: 
				@if($table == "nganh")
					cột A là dữ liệu mã ngành và cột B là dữ liệu tên ngành
				@elseif($table == "lop")
					cột A là dữ liệu mã lớp, cột B là dữ liệu tên lớp và cột C là dữ liệu mã ngành
				@elseif($table == "hoc-vi")
					cột A là dữ liệu mã học vị và cột B là dữ liệu tên học vị
				@else
					cột A là dữ liệu mã chức vụ và cột B là dữ liệu tên chức vụ
				@endif
			</p>
			<br>
			<button class="btn btn-primary" type="submit"> Nhập dữ liệu </button>
		</form>
	</div>
</div>
