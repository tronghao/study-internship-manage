<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiHuongDanModel extends Model
{
    protected $table = 'nguoihuongdan';
    protected $fillable = ['maChucVu', 'maDonVi'];
    public $timestamps = false;
    protected $primaryKey = "email";  //trường khóa chính
    protected $keyType = 'string'; //kieur dữ liệu của trường đó
}
