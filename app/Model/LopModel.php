<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LopModel extends Model
{
    protected $table = 'lop';
    protected $fillable = ['tenLop', 'maNganh'];
    public $timestamps = false;
}
