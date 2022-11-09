<?php

namespace App\Http\Controllers\Admin;

use App\Utilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getLogin() {
        return view('admin.login');
    }

    public function postLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_admin, Constant::user_level_host], // Tài khoản cấp độ admin hoặc host
        ];

        $remember = $request->remember;
        if(Auth::attempt($credentials, $remember)) {
            return redirect()->intended('admin');
        } else {
            return back()->with('notification', 'error: Email or password is wrong');
        }
    }

    public function logout() {
        Auth::logout();

        return redirect('admin/login');
    }
}
