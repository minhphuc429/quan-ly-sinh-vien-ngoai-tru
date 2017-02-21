<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NgoaiTru;

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
        return view('ngoaitrus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ngoaitru = NgoaiTru::findOrFail($id);

        return view('ngoaitrus.show')->with('ngoaitru', $ngoaitru);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ngoaitru = NgoaiTru::findOrFail($id);
        $ngoaitru->delete();

        return redirect()->route('ngoaitrus.index')->with('status', 'Xóa Thông Tin Ngoại Trú Sinh Viên Thành Công');
    }
}
