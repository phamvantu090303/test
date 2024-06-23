<?php

namespace App\Http\Controllers;

use App\Models\Danhsachtaikhoan;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function view()
    {
        return view('mail.view_sen_mail');
    }

    public function mail_3()
    {
        return view('mail.dat_ve');
    }
    public function viewForgotPassword()
    {
        return view('client.page.password.forgot_password');
    }

    public function viewChangePassword()
    {
        return view('client.page.password.change_password');
    }

    public function kichhoat($id)
    {
        $taiKhoan   = Danhsachtaikhoan::where('thay_the_id', $id)->first();
        if($taiKhoan) {
            $taiKhoan->tinh_trang   =   1;
            $taiKhoan->thay_the_id  =   null;
            $taiKhoan->save();

            toastr()->success('Đã kích hoạt tài khoản thành công!');
            return redirect('/login');
        } else {
            toastr()->error("Tài khoản không tồn tại!");
            return redirect('/');
        }
    }
    public function doiMatKhau($id)
    {
        $taiKhoan   =   DanhSachTaiKhoan::where('ma_doi_mat_khau', $id)->first();
        if($taiKhoan) {
            return view('client.page.password.change_password', compact('id'));
        } else {
            toastr()->error('Liên kết không tồn tại!');
            return redirect('/');
        }
    }
}
