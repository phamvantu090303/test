<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function login(){
        return view('client.login.login');
     }
     public function logout()
     {
         Auth::guard('client')->logout();
         toastr()->success('Đã đăng xuất tài khoản thành công!');
         return redirect('/login');
     }
     public function logoutAdmin()
     {
         Auth::guard('admin')->logout();
         toastr()->success('Đã đăng xuất tài khoản thành công!');
         return redirect('/admin/login');
     }
}
