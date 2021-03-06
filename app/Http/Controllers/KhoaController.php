<?php

namespace App\Http\Controllers;

use App\Lop;
use Illuminate\Http\Request;
use Validator;
use App\Khoa;

class KhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khoas = Khoa::all();
        return view('khoas.index')->with('khoas', $khoas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('khoas.create');
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
            'makhoa'  => 'required|unique:khoas|max:7',
            'tenkhoa' => 'required|unique:khoas|max:255',
        ];

        $messages = [
            'makhoa.required'  => 'Chưa nhập mã khoa',
            'makhoa.max'    => 'Mã khoa chỉ chứa tối đa 7 ký tự',
            'tenkhoa.required' => 'Chưa nhập tên khoa',
            'tenkhoa.unique'   => 'Tên khoa đã tồn tại trước đó',
            'tenkhoa.max'      => 'Tên khoa chỉ chứa tối đa 255 ký tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('khoas.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $khoa = new Khoa;

        $khoa->MaKhoa = $request->makhoa;
        $khoa->TenKhoa = $request->tenkhoa;
        $khoa->save();

        return redirect()->back()->with('status', 'Thêm Mã Khoa Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $khoa = Khoa::findOrfail($id);

        return view('khoas.show')->with('khoa', $khoa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khoa = Khoa::findOrfail($id);

        return view('khoas.edit')->with('khoa', $khoa);
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
            'makhoa'  => 'required|max:7',
            'tenkhoa' => 'required|max:255',
        ];

        $messages = [
            'makhoa.required'  => 'Chưa nhập mã khoa',
            'makhoa.max'   => 'Mã khoa chỉ chứa tối đa 7 ký tự',
            'tenkhoa.required' => 'Chưa nhập tên khoa',
            'tenkhoa.max'      => 'Tên khoa chỉ chứa tối đa 255 ký tự',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('khoas.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }

        $khoa = Khoa::findOrfail($id);

        $khoa->MaKhoa = $request->makhoa;
        $khoa->TenKhoa = $request->tenkhoa;
        $khoa->save();

        return redirect()->back()->with('status', 'Cập Nhật Mã Khoa Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khoa = Khoa::findOrfail($id);
        $khoa->delete();

        /*return redirect()->route('khoas.index')->with('status', 'Xóa Mã Khoa Thành Công');*/
        return response()->json();
    }
}
