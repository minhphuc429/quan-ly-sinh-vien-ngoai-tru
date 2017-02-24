<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NgoaiTru extends Model
{
    protected $table = 'ngoaitrus';

    public function sinhvien()
    {
        return $this->belongsTo('App\SinhVien');
    }
}
