<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVienModel extends Model
{
    protected $table = 'sinhvien';
    protected $fillable = ['maLop'];
    public $timestamps = false;
    protected $primaryKey = "email";  //trường khóa chính
    protected $keyType = 'string'; //kieur dữ liệu của trường đó
    
}
