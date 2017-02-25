<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permissions.create');
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
            'name'    => 'required|max:255',
            'displayname'     => 'required|max:255',
            'description' => 'required|max:255',
        ];

        $messages = [
            'name.required'    => 'Chưa nhập Tên Permission',
            'displayname.required'     => 'Chưa nhập Display Name Permission',
            'description.required' => 'Chưa nhập Description',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('permissions.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $permission = new Permission();

        $permission->name = $request->name;
        $permission->display_name = $request->displayname;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->back()->with('status', 'Thêm Permisison Thành Công');
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
        $permission = Permission::findOrFail($id);

        return view('permissions.edit')->with('permission', $permission);
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
            'name'    => 'required|max:255',
            'displayname'     => 'required|max:255',
            'description' => 'required|max:255',
        ];

        $messages = [
            'name.required'    => 'Chưa nhập Tên Permission',
            'displayname.required'     => 'Chưa nhập Display Name Permission',
            'description.required' => 'Chưa nhập Description',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('permissions.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }

        $permission = Permission::findOrFail($id);

        $permission->name = $request->name;
        $permission->display_name = $request->displayname;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->back()->with('status', 'Cập Nhật Permission Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        /*return redirect()->route('permissions.index')->with('status', 'Xóa Permission Thành Công');*/
        return response()->json();
    }
}
