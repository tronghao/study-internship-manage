<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocViModel extends Model
{
    protected $table = 'hocvi';
    protected $fillable = ['tenHocVi'];
    public $timestamps = false;
}
