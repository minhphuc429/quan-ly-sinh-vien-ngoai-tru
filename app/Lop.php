<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
    protected $table = 'lops';

    public function khoa()
    {
        return $this->belongsTo('App\Khoa', 'lops_makhoa_foreign');
    }

    public function sinhvien()
    {
        return $this->hasMany('App\SinhVien');
    }
}
