<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $fillable = ['hoten', 'password', 'sdt', 'trangThai', 'loiGioiThieu', 'loaiUser'];
    public $timestamps = false;
}
