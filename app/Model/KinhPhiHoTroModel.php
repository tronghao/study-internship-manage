<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KinhPhiHoTroModel extends Model
{
    protected $table = 'kinhphihotro';
    protected $fillable = ['soTien'];
    public $timestamps = false;
}
