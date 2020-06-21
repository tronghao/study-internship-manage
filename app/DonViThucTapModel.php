<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViThucTapModel extends Model
{
    protected $table = 'donvithuctap';
    protected $fillable = ['maDonVi','tenDonVi', 'diaChiDonVi', 'sdtDonVi', 'soKM'];
    public $timestamps = false;

    protected $primaryKey = "maDonVi";  //trường khóa chính
    protected $keyType = 'string'; //kieur dữ liệu của trường đó
}
