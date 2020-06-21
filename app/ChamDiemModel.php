<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChamDiemModel extends Model
{
    protected $table = 'chamdiem';
    protected $fillable = ['ngayKetThucThucTap'];
    public $timestamps = false;

    protected $primaryKey = ['emailSV', 'emailNguoiCham'];  //trường khóa chính
    protected $keyType = ['string', 'string']; //kieur dữ liệu của trường đó
}
