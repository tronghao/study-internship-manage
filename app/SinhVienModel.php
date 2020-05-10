<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVienModel extends Model
{
    protected $table = 'sinhvien';
    protected $fillable = ['maLop'];
    public $timestamps = false;
}
