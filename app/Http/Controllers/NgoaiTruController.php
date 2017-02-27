<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NgoaiTru;
use App\SinhVien;
use Validator;

class NgoaiTruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ngoaitrus = NgoaiTru::all();

        return view('ngoaitrus.index')->with('ngoaitrus', $ngoaitrus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sinhviens = SinhVien::all();

        return view('ngoaitrus.create')->with('sinhviens', $sinhviens);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'MaSV'       => 'required|unique:ngoai_trus',
            'HTChuNha'   => 'required|max:255',
            'DTChuNha'   => 'required|max:255',
            'SoNha'      => 'required|max:255',
            'Duong'      => 'required|max:255',
            'ToDanPho'   => 'required|max:255',
            'Phuong'     => 'required|max:255',
            'QuanHe'     => 'required|max:255',
            'HTToTruong' => 'required|max:255',
            'DTToTruong' => 'required|max:255',
        ];

        $messages = [
            'MaSV.required'       => 'Chưa nhập mã sinh viên',
            'MaSV.unique'         => 'Mã Sinh Viên trùng',
            'HTChuNha.required'   => 'Chưa nhập họ tên chủ nhà',
            'DTChuNha.required'   => 'Chưa nhập số điện thoại chủ nhà',
            'SoNha.required'      => 'Chưa nhập số nhà',
            'Duong.required'      => 'Chưa nhập tên đường',
            'ToDanPho.required'   => 'Chưa nhập tổ dân phố',
            'Phuong.required'     => 'Chưa nhập phường',
            'QuanHe.required'     => 'Chưa nhập quan hệ',
            'HTToTruong.required' => 'Chưa nhập họ tên tổ trưởng',
            'DTToTruong.required' => 'Chưa nhập số điện thoại tổ trưởng',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('ngoaitrus.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $ngoaitru = new NgoaiTru();

        $ngoaitru->MaSV = $request->MaSV;
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

        return redirect()->back()->with('status', 'Thêm Thông Tin Ngoại Trú Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ngoaitru = NgoaiTru::findOrFail($id);

        return view('ngoaitrus.edit')->with('ngoaitru', $ngoaitru);
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
            'MaSV'       => 'required|max:5',
            'HTChuNha'   => 'required|max:255',
            'DTChuNha'   => 'required|max:255',
            'SoNha'      => 'required|max:255',
            'Duong'      => 'required|max:255',
            'ToDanPho'   => 'required|max:255',
            'Phuong'     => 'required|max:255',
            'QuanHe'     => 'required|max:255',
            'HTToTruong' => 'required|max:255',
            'DTToTruong' => 'required|max:255',
        ];

        $messages = [
            'MaSV.required'       => 'Chưa nhập mã sinh viên',
            'HTChuNha.required'   => 'Chưa nhập họ tên chủ nhà',
            'DTChuNha.required'   => 'Chưa nhập số điện thoại chủ nhà',
            'SoNha.required'      => 'Chưa nhập số nhà',
            'Duong.required'      => 'Chưa nhập tên đường',
            'ToDanPho.required'   => 'Chưa nhập tổ dân phố',
            'Phuong.required'     => 'Chưa nhập phường',
            'QuanHe.required'     => 'Chưa nhập quan hệ',
            'HTToTruong.required' => 'Chưa nhập họ tên tổ trưởng',
            'DTToTruong.required' => 'Chưa nhập số điện thoại tổ trưởng',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('ngoaitrus.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $ngoaitru = NgoaiTru::findOrfail($id);

        $ngoaitru->MaSV = $request->MaSV;
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

        return redirect()->back()->with('status', 'Cập Nhật Thông Tin Ngoại Trú Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ngoaitru = NgoaiTru::findOrFail($id);
        $ngoaitru->delete();

        /*return redirect()->route('ngoaitrus.index')->with('status', 'Xóa Thông Tin Ngoại Trú Sinh Viên Thành Công');*/

        return response()->json();
    }
}
