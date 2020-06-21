<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuChamModel extends Model
{
    protected $table = 'phieucham';
    protected $fillable = ['diem', 'ngayCham', 'nhanXet'];
    public $timestamps = false;
    protected $primaryKey = "maPhieuCham";  //trường khóa chính
    protected $keyType = 'string'; //kieur dữ liệu của trường đó
}
