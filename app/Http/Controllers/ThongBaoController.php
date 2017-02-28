<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongBao;
use Illuminate\Support\Facades\DB;
use Validator;

class ThongBaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lấy Thông Báo, sắp xếp theo thứ tự thời gian tạo mới nhất (giảm dần)
        $thongbaos = DB::table('thong_baos')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('thongbaos.index')->with('thongbaos', $thongbaos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thongbaos.create');
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
            'title'         => 'required',
            'description' => 'required',
            'noidung'  => 'required',
        ];

        $messages = [
            'title.required'         => 'Chưa nhập Title',
            'description.required' => 'Chưa nhập Description',
            'noidung.required'  => 'Chưa nhập mã Content',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('thongbaos.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $thongbao = new ThongBao();
        $thongbao->title = $request->title;
        $thongbao->description = $request->description;
        $thongbao->noidung = $request->noidung;
        $thongbao->save();

        return redirect()->back()->with('status', 'Thêm Thông Báo Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thongbao = ThongBao::findOrFail($id);

        return view('thongbaos.show')->with('thongbao' , $thongbao);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thongbao = ThongBao::findOrFail($id);

        return view('thongbaos.edit')->with('thongbao', $thongbao);
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
            'title'         => 'required',
            'description' => 'required',
            'noidung'  => 'required',
        ];

        $messages = [
            'title.required'         => 'Chưa nhập Title',
            'description.required' => 'Chưa nhập Description',
            'noidung.required'  => 'Chưa nhập mã Content',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('thongbaos.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $thongbao = ThongBao::findOrFail($id);
        $thongbao->title = $request->title;
        $thongbao->description = $request->description;
        $thongbao->noidung = $request->noidung;
        $thongbao->save();

        return redirect()->back()->with('status', 'Cập Nhật Thông Báo Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thongbao = ThongBao::findOrFail($id);
        $thongbao->delete();

        //return redirect()->route('sinhviens.index')->with('status', 'Xóa Thông Tin Sinh Viên Thành Công');
        return response()->json();
    }
}
