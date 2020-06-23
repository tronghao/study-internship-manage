<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThucTapModel extends Model
{
    protected $table = 'thuctap';
    protected $fillable = ['emailGV', 'emailNHD', 'maDonVi', 'ngayBatDauThucTap'];
    public $timestamps = false;
    protected $primaryKey = "emailSV";  //trường khóa chính
    protected $keyType = 'string'; //kieur dữ liệu của trường đó
}
