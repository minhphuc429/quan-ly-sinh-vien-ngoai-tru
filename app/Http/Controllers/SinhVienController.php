<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\SinhVienRequest;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        return view('sinhviens.show')->withTask($sinhvien);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sinhvien = SinhVien::findOrfaild($id);
       return view('sinhvien.edit')->withTask($sinhvien);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sinhvien = SinhVien::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        $task->fill($input)->save();

        Session::flash('status', 'Task successfully added!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $sinhvien = SinhVien::findOrfaild($id);
        $sinhvien->delete();
    }
}
