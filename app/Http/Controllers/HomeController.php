<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Khoa;
use App\Lop;
use App\SinhVien;
use App\NgoaiTru;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khoa = Khoa::all()->count();
        $lop = Lop::all()->count();
        $sinhvien = SinhVien::all()->count();
        $ngoaitru = NgoaiTru::all()->count();

        return view('home')->with([
            'khoa'     => $khoa,
            'lop'      => $lop,
            'sinhvien' => $sinhvien,
            'ngoaitru' => $ngoaitru,
        ]);
    }
}
