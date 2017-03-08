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
        $users = User::all();
        $lops = Lop::all();

        return view('sinhviens.create')->with([
            'lops'  => $lops,
            'users' => $users,
        ]);
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
            'MaSV'      => 'required',
            'MaLop'     => 'required',
            'GioiTinh'  => 'required',
            'NgaySinh'  => 'required',
            'DiaChi'    => 'required',
            'DienThoai' => 'required',
        ];

        $messages = [
            'MaSV.required'      => 'Chưa nhập ID sinh viên',
            'GioiTinh.required'  => 'Chưa chọn giới tính',
            'NgaySinh.required'  => 'Chưa nhập ngày sinh',
            'DiaChi.required'    => 'Chưa nhập địa chỉ',
            'MaLop.required'     => 'Chưa nhập lớp',
            'DienThoai.required' => 'Chưa nhập SĐT',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('sinhviens.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $sinhvien = SinhVien::where('MaSV', $request->MaSV)->first();
        if (!$sinhvien == null)
            return redirect()->back()->with('status', 'Sinh viên đã thông tin sẵn trước đó');

        $date = Carbon::createFromFormat('d/m/Y', $request->NgaySinh);

        $sinhvien = new SinhVien;

        $sinhvien->MaSV = $request->MaSV;
        $sinhvien->GioiTinh = $request->GioiTinh;
        $sinhvien->NgaySinh = $date->toDateString();
        $sinhvien->DiaChi = $request->DiaChi;
        $sinhvien->MaLop = $request->MaLop;
        $sinhvien->DienThoai = $request->DienThoai;
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
