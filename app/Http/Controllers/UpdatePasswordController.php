<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;
use Auth;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return view('auth.passwords.update');
    }

    /**
     * Update the password for the user.
     *
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $rules = [
            'current_password'      => 'required',
            'password'              => 'required|between:8,32',
            'password_confirmation' => 'required|same:password',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        }

        // Verifying A Password Against A Hash
        if (Hash::check($request->current_password, Auth::user()->getAuthPassword())) {
            $request->user()->fill([
                'password' => Hash::make($request->password),
            ])->save();

            return redirect()->back()->with('status', 'Cập Nhật Mật Khẩu Thành Công');
        } else {
            return redirect()->back()->with('error', 'Mật Khẩu Cũ Không Đúng');
        }
    }
}
