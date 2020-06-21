<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongBaoModel extends Model
{
    protected $table = 'thong-bao';
    protected $fillable = ['img', 'title', 'content', 'quote'];
    public $timestamps = false;
    protected $primaryKey = "id";  //trường khóa chính
    protected $keyType = 'bigIncrements'; //kieur dữ liệu của trường đó
}
