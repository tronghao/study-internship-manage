<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocViModel extends Model
{
    protected $table = 'hocvi';
    protected $fillable = ['tenHocVi'];
    public $timestamps = false;
    protected $primaryKey = "maHocVi";  //trường khóa chính
    protected $keyType = 'string'; //kieur dữ liệu của trường đó
}
