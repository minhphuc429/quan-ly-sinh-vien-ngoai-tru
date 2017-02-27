<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Validator;
use Illuminate\Support\Facades\DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('users.create')->with('roles', $roles);
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
            'name'     => 'required',
            'username' => 'required|unique:users,username,',
            'email'    => 'required|email|unique:users,email,',
            'password' => 'required|same:confirm-password',
            'roles'    => 'required',
        ];

        $messages = [
            'name.required'     => 'Chưa nhập Tên',
            'username.required' => 'Chưa nhập User Name',
            'email.required'    => 'Chưa nhập Email',
            'password.required'    => 'Chưa nhập Password',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('users.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->back()->with('status', 'Thêm User Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $userRole = $user->roles->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
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
            'name'     => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles'    => 'required',
        ];

        $messages = [
            'name.required'     => 'Chưa nhập Tên',
            'username.required' => 'Chưa nhập User Name',
            'email.required'    => 'Chưa nhập Email',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect(route('users.edit', $id))
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id', $id)->delete();

        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->back()->with('status', 'Cập Nhật User Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        /*return redirect()->route('khoas.index')->with('status', 'Xóa Mã Khoa Thành Công');*/

        return response()->json();
    }
}
