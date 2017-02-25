<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create')->with('permissions', $permissions);
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
            'name'         => 'required|unique:roles,name|max:255',
            'display_name' => 'required|max:255',
            'description'  => 'required|max:255',
            'permissions'  => 'required',
        ];

        $messages = [
            'name.required'         => 'Chưa nhập Name',
            'display_name.required' => 'Chưa nhập Display Name',
            'description.required'  => 'Chưa nhập mã Description',
            'permissions.required'  => 'Chưa nhập Permission',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('roles.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        foreach ($request->permissions as $permissions) {
            $role->attachPermission($permissions);
        }

        return redirect()->back()->with('status', 'Role Được Tạo Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("permission_role", "permission_role.permission_id", "=", "permissions.id")
            ->where("permission_role.role_id", $id)
            ->get();

        /*return view('roles.show', compact('role', 'rolePermissions'));*/

        return view('roles.show')->with(
            [
                'role'            => $role,
                'rolePermissions' => $rolePermissions,
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
        $role = Role::find($id);
        $permissions = Permission::all();
        /*$rolePermissions = DB::table("permission_role")->where("permission_role.role_id", $id)
            ->lists('permission_role.permission_id', 'permission_role.permission_id');*/

        return view('roles.edit')->with(
            [
                'role'            => $role,
                'permissions'     => $permissions,
                /*'rolePermissions' => $rolePermissions,*/
            ]);
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
            'name'         => 'required|max:255',
            'display_name' => 'required|max:255',
            'description'  => 'required|max:255',
            'permissions'  => 'required',
        ];

        $messages = [
            'name.required'         => 'Chưa nhập Name',
            'display_name.required' => 'Chưa nhập Display Name',
            'description.required'  => 'Chưa nhập mã Description',
            'permissions.required'  => 'Chưa nhập Permission',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('roles.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $role = Role::find($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        foreach ($request->permissions as $permissions) {
            $role->attachPermission($permissions);
        }

        return redirect()->back()->with('status', 'Role Được Cập Nhật Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
