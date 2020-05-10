<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThucTapModel extends Model
{
    protected $table = 'thuctap';
    protected $fillable = ['idGiangVien', 'idNguoiHuongDan', 'maDonVi', 'idKinhPhi', 'ngayBatDauThucTap'];
    public $timestamps = false;
}
