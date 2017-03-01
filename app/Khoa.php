<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    protected $table = 'khoas';
    public $timestamps = false;

    public function lop(){
        return $this->hasMany('lop', 'lops_makhoa_foreign');
    }
}
