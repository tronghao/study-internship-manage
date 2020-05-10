<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuChamModel extends Model
{
    protected $table = 'phieucham';
    protected $fillable = ['diem', 'ngayCham', 'nhanXet'];
    public $timestamps = false;
}
