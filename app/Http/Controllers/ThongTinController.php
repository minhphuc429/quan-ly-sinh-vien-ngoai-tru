<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\NgoaiTru;
use App\SinhVien;
use Validator;

class ThongTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $masv = User::findOrFail($id)->username;
        $sinhvien = SinhVien::where('MaSV', $masv)->first();
        $ngoaitru = NgoaiTru::where('MaSV', $masv)->first();

        return view('thongtins.show')->with([
            'id'       => $id,
            'sinhvien' => $sinhvien,
            'ngoaitru' => $ngoaitru,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masv = User::findOrFail($id)->username;
        $sinhvien = SinhVien::where('MaSV', $masv)->first();
        $ngoaitru = NgoaiTru::where('MaSV', $masv)->first();
        //return var_dump($ngoaitru);
        if ($ngoaitru === null) {
            $ngoaitru = new NgoaiTru();
            $ngoaitru->MaSV = $masv;
            $ngoaitru->HTChuNha = '';
            $ngoaitru->DTChuNha = '';
            $ngoaitru->SoNha = '';
            $ngoaitru->Duong = '';
            $ngoaitru->ToDanPho = '';
            $ngoaitru->Phuong = '';
            $ngoaitru->QuanHe = '';
            $ngoaitru->HTToTruong = '';
            $ngoaitru->DTToTruong = '';
            $ngoaitru->save();
        }

        //return var_dump($ngoaitru);

        return view('thongtins.edit')->with([
            'id'       => $id,
            'sinhvien' => $sinhvien,
            'ngoaitru' => $ngoaitru,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'DienThoai'  => 'max:255',
            'email'      => 'max:255',
            'HTChuNha'   => 'max:255',
            'DTChuNha'   => 'max:255',
            'SoNha'      => 'max:255',
            'Duong'      => 'max:255',
            'ToDanPho'   => 'max:255',
            'Phuong'     => 'max:255',
            'QuanHe'     => 'max:255',
            'HTToTruong' => 'max:255',
            'DTToTruong' => 'max:255',
        ];

        $messages = [
            'HTChuNha.max'   => 'Chưa nhập họ tên chủ nhà',
            'DTChuNha.max'   => 'Chưa nhập số điện thoại chủ nhà',
            'SoNha.max'      => 'Chưa nhập số nhà',
            'Duong.max'      => 'Chưa nhập tên đường',
            'ToDanPho.max'   => 'Chưa nhập tổ dân phố',
            'Phuong.max'     => 'Chưa nhập phường',
            'QuanHe.max'     => 'Chưa nhập quan hệ',
            'HTToTruong.max' => 'Chưa nhập họ tên tổ trưởng',
            'DTToTruong.max' => 'Chưa nhập số điện thoại tổ trưởng',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        /*$masv = User::findOrFail($id)->username;*/
        $user = User::findOrFail($id);
        $user->email = $request->email;
        $user->save();

        $sinhvien = SinhVien::where('MaSV', $user->username)->first();
        $sinhvien->DienThoai = $request->DienThoai;
        $sinhvien->save();

        $ngoaitru = NgoaiTru::where('MaSV', $user->username)->first();
        $ngoaitru->HTChuNha = $request->HTChuNha;
        $ngoaitru->DTChuNha = $request->DTChuNha;
        $ngoaitru->SoNha = $request->SoNha;
        $ngoaitru->Duong = $request->Duong;
        $ngoaitru->ToDanPho = $request->ToDanPho;
        $ngoaitru->Phuong = $request->Phuong;
        $ngoaitru->QuanHe = $request->QuanHe;
        $ngoaitru->HTToTruong = $request->HTToTruong;
        $ngoaitru->DTToTruong = $request->DTToTruong;
        $ngoaitru->save();

        return redirect()->back()->with('status', 'Cập Nhật Thông Tin Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
