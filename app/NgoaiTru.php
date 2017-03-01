<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NgoaiTru extends Model
{
    protected $table = 'ngoai_trus';

    public function sinhvien()
    {
        return $this->belongsTo('App\SinhVien');
    }
}
