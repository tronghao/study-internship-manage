<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionModel extends Model
{
    protected $table = 'option';
    protected $fillable = ['optionName', 'value'];
    public $timestamps = false;
}
