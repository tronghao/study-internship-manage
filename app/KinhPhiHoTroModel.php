<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KinhPhiHoTroModel extends Model
{
    protected $table = 'kinhphihotro';
    protected $fillable = ['soTien'];
    public $timestamps = false;
    protected $primaryKey = "idKinhPhi";  //trường khóa chính
    protected $keyType = 'bigInteger'; //kieur dữ liệu của trường đó
}
