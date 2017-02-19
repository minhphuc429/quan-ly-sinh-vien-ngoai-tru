<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\SinhVien;
use Carbon\Carbon;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinhviens = SinhVien::all();
        return view('sinhviens.index')->with('sinhviens', $sinhviens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sinhviens.create');
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
            'tensv' => 'required|max:255',
            'idsv' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'diachi' => 'required',
            'lop' => 'required',
            'sdt' => 'required',
            'email' => 'required',
        ];

        $messages = [
            'tensv.required' => 'Chưa nhập tên',
            'idsv.required' => 'Chưa nhập ID sinh viên',
            'gioitinh.required' => 'Chưa chọn giới tính',
            'ngaysinh.required' => 'Chưa nhập ngày sinh',
            'diachi.required' => 'Chưa nhập địa chỉ',
            'lop.required' => 'Chưa nhập lớp',
            'sdt.required' => 'Chưa nhập SĐT',
            'email.required' => 'Chưa nhập email',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('sinhviens.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $date = Carbon::createFromFormat('d/m/Y', $request->ngaysinh);

        $sinhvien = new SinhVien;

        $sinhvien->TenSv = $request->tensv;
        $sinhvien->IDSV = $request->idsv;
        $sinhvien->GioiTinh = $request->gioitinh;
        $sinhvien->NgaySinh = $date->toDateString();
        $sinhvien->DiaChi = $request->diachi;
        $sinhvien->Lop = $request->lop;
        $sinhvien->DienThoai = $request->sdt;
        $sinhvien->Email = $request->email;
        $sinhvien->save();

        return redirect('sinhviens')->with('status', 'Thêm Thông Tin Sinh Viên Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        return view('sinhviens.show')->with('sinhvien', $sinhvien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        return view('sinhviens.edit')->with('sinhvien', $sinhvien);
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
            'tensv' => 'required|max:255',
            'idsv' => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'diachi' => 'required',
            'lop' => 'required',
            'sdt' => 'required',
            'email' => 'required',
        ];

        $messages = [
            'tensv.required' => 'Chưa nhập tên',
            'idsv.required' => 'Chưa nhập ID sinh viên',
            'gioitinh.required' => 'Chưa chọn giới tính',
            'ngaysinh.required' => 'Chưa nhập ngày sinh',
            'diachi.required' => 'Chưa nhập địa chỉ',
            'lop.required' => 'Chưa nhập lớp',
            'sdt.required' => 'Chưa nhập SĐT',
            'email.required' => 'Chưa nhập email',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('sinhviens.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }

        $sinhvien = SinhVien::findOrFail($id);

        $date = Carbon::createFromFormat('d/m/Y', $request->ngaysinh);

        $sinhvien->TenSv = $request->tensv;
        $sinhvien->IDSV = $request->idsv;
        $sinhvien->GioiTinh = $request->gioitinh;
        $sinhvien->NgaySinh = $date->toDateString();
        $sinhvien->DiaChi = $request->diachi;
        $sinhvien->Lop = $request->lop;
        $sinhvien->DienThoai = $request->sdt;
        $sinhvien->Email = $request->email;
        $sinhvien->save();

        return redirect()->back()->with('status', 'Cập Nhật Thông Tin Sinh Viên Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien->delete();

        return redirect()->route('sinhviens.index')->with('status', 'Xóa Thông Tin Sinh Viên Thành Công');
    }
}
