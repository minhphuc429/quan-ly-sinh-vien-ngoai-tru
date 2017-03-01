<?php

namespace App\Http\Controllers;

use App\Lop;
use App\NgoaiTru;
use App\User;
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
        $lops = Lop::all();

        return view('sinhviens.create')->with('lops', $lops);
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
            'tensv'    => 'required|max:255',
            'idsv'     => 'required',
            'gioitinh' => 'required',
            'ngaysinh' => 'required',
            'diachi'   => 'required',
            'malop'    => 'required',
            'sdt'      => 'required',
            'email'    => 'required',
        ];

        $messages = [
            'tensv.required'    => 'Chưa nhập tên',
            'idsv.required'     => 'Chưa nhập ID sinh viên',
            'gioitinh.required' => 'Chưa chọn giới tính',
            'ngaysinh.required' => 'Chưa nhập ngày sinh',
            'diachi.required'   => 'Chưa nhập địa chỉ',
            'malop.required'    => 'Chưa nhập lớp',
            'sdt.required'      => 'Chưa nhập SĐT',
            'email.required'    => 'Chưa nhập email',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('sinhviens.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $date = Carbon::createFromFormat('d/m/Y', $request->ngaysinh);

        $sinhvien = new SinhVien;

        $sinhvien->HoTen = $request->tensv;
        $sinhvien->MaSV = $request->idsv;
        $sinhvien->GioiTinh = $request->gioitinh;
        $sinhvien->NgaySinh = $date->toDateString();
        $sinhvien->DiaChi = $request->diachi;
        $sinhvien->MaLop = $request->malop;
        $sinhvien->DienThoai = $request->sdt;
        $sinhvien->Email = $request->email;
        $sinhvien->save();

        return redirect()->back()->with('status', 'Thêm Thông Tin Sinh Viên Thành Công');
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
        $sinhvien->NgaySinh = date('d-m-Y', strtotime($sinhvien->NgaySinh));
        $user = User::where('username', $sinhvien->MaSV)->first();
        $ngoaitru = NgoaiTru::where('MaSV', $sinhvien->MaSV)->first();

        return view('sinhviens.show')->with([
            'sinhvien' => $sinhvien,
            'user'     => $user,
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
        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien->NgaySinh = date('d-m-Y', strtotime($sinhvien->NgaySinh));
        $user = User::where('username', $sinhvien->MaSV)->first();

        return view('sinhviens.edit')->with(['sinhvien' => $sinhvien, 'user' => $user]);
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
            'name'      => 'required|max:255',
            'MaSV'      => 'required',
            'MaLop'     => 'required',
            'GioiTinh'  => 'required',
            'NgaySinh'  => 'required',
            'DiaChi'    => 'required',
            'DienThoai' => 'required',
            'email'     => 'required',
        ];

        $messages = [
            'name.required'      => 'Chưa nhập tên',
            'MaSV.required'      => 'Chưa nhập ID sinh viên',
            'MaLop.required'     => 'Chưa chọn mã lớp',
            'GioiTinh.required'  => 'Chưa nhập giới tính',
            'NgaySinh.required'  => 'Chưa nhập ngày sinh',
            'DiaChi.required'    => 'Chưa nhập địa chỉ',
            'DienThoai.required' => 'Chưa nhập SĐT',
            'email.required'     => 'Chưa nhập email',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('sinhviens.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }

        $sinhvien = SinhVien::findOrFail($id);
        $date = Carbon::createFromFormat('d/m/Y', $request->NgaySinh);
        $sinhvien->MaSV = $request->MaSV;
        $sinhvien->MaLop = $request->MaLop;
        $sinhvien->GioiTinh = $request->GioiTinh;
        $sinhvien->NgaySinh = $date->toDateString();
        $sinhvien->DiaChi = $request->DiaChi;
        $sinhvien->DienThoai = $request->DienThoai;
        $sinhvien->save();

        $user = User::where('username', $sinhvien->MaSV)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

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

        //return redirect()->route('sinhviens.index')->with('status', 'Xóa Thông Tin Sinh Viên Thành Công');
        return response()->json();
    }
}
