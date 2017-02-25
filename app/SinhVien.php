<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'sinh_viens';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lop()
    {
        return $this->belongsTo('App\Lop');
    }

    public function ngoaitru()
    {
        return $this->hasOne('App\NgoaiTru');
    }
}
