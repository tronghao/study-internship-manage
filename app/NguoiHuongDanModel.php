<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiHuongDanModel extends Model
{
    protected $table = 'nguoihuongdan';
    protected $fillable = ['maChucVu', 'maDonVi'];
    public $timestamps = false;
}
