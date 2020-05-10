<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiangVienModel extends Model
{
    protected $table = 'giangvien';
    protected $fillable = ['maHocVi'];
    public $timestamps = false;
}
