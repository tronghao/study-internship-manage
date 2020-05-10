<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViThucTapModel extends Model
{
    protected $table = 'donvithuctap';
    protected $fillable = ['tenDonVi', 'diaChiDonVi', 'sdtDonVi', 'soKM'];
    public $timestamps = false;
}
