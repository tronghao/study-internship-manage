<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVuModel extends Model
{
    protected $table = 'chucvu';
    protected $fillable = ['tenChucVu'];
    public $timestamps = false;
}
