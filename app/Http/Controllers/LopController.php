<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Lop;
use App\Khoa;

class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lops = Lop::all();

        return view('lops.index')->with('lops', $lops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $khoas = Khoa::all();

        return view('lops.create')->with('khoas', $khoas);
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
            'malop'  => 'required',
            'tenlop' => 'required',
            'makhoa' => 'required',
        ];

        $messages = [
            'malop.required'  => 'Mã Lớp Không Được Để Trống',
            'tenlop.required' => 'Tên Lớp Không Được Để Trống',
            'makhoa.required' => 'Mã Khoa Không Được Để Trống',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('lops.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $lop = new Lop;

        $lop->MaLop = $request->malop;
        $lop->TenLop = $request->tenlop;
        $lop->MaKhoa = $request->makhoa;
        $lop->save();

        return redirect()->back()->with('status', 'Thêm Mã Lớp Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lop = Lop::findOrfail($id);

        return view('lops.show')->with('lop', $lop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lop = Lop::findOrfail($id);
        $khoas = Khoa::all();

        return view('lops.edit')->with(['khoas' => $khoas, 'lop' => $lop]);
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
            'malop'  => 'required',
            'tenlop' => 'required',
            'makhoa' => 'required',
        ];

        $messages = [
            'malop.required'  => 'Mã Lớp Không Được Để Trống',
            'tenlop.required' => 'Tên Lớp Không Được Để Trống',
            'makhoa.required' => 'Mã Khoa Không Được Để Trống',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('lops.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }

        $lop = Lop::findOrfail($id);

        $lop->MaLop = $request->malop;
        $lop->TenLop = $request->tenlop;
        $lop->MaKhoa = $request->makhoa;
        $lop->save();

        return redirect()->back()->with('status', 'Cập Nhật Mã Lớp Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lop = Lop::findOrfail($id);
        $lop->delete();

        //return redirect(route('lops.index'))->with('status', 'Xóa Mã Lớp Thành Công');
        return response()->json();
    }
}
