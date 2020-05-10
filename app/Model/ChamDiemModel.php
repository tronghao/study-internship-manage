<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChamDiemModel extends Model
{
    protected $table = 'chamdiem';
    protected $fillable = ['ngayKetThucThucTap'];
    public $timestamps = false;
}
