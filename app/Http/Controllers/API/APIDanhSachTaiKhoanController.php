<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Danhsachtaikhoan;
use App\Models\QuyenChucNang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\sendMail;
use App\Mail\SenMail;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class APIDanhSachTaiKhoanController extends Controller
{
    public function search(Request $request){
        //tim kiem theo ten
        $data   = Danhsachtaikhoan::where('ho_va_ten','like','%'.$request->tt.'%')
                                   ->orWhere('email','like','%'.$request->tt.'%')
                                   ->orWhere('so_dien_thoai','like','%'.$request->tt.'%')
                              ->get();

        return response()->json([
            'xxx'    => $data,
        ]);
    }
    public function resetPassword(Request $request)
    {
        $taiKhoan   = DanhSachTaiKhoan::where('email', $request->email)->first();

        if($taiKhoan) {
            $taiKhoan->ma_doi_mat_khau  =   Str::uuid();
            $taiKhoan->save();

            $data['ho_va_ten']          =   $taiKhoan->ho_va_ten;
			$data['link']               =   'http://127.0.0.1:8000/doi-mat-khau/' . $taiKhoan->ma_doi_mat_khau;

            Mail::to($taiKhoan->email)->send(new SenMail('Khôi Phục Mật Khẩu', 'mail.quen_mk', $data));

            return response()->json([
                'status'    => 1,
                'message'   => 'Vui lòng kiểm tra email của bạn!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Email không tồn tại!',
            ]);
        }
    }
    public function doiMatKhau(Request $request)
    {
        $taiKhoan   = DanhSachTaiKhoan::where('ma_doi_mat_khau', $request->id)->first();

        if($taiKhoan) {
            $taiKhoan->password         =   bcrypt($request->password);
            $taiKhoan->ma_doi_mat_khau  =   null;
            $taiKhoan->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã đổi mật khẩu thành công!',
            ]);

        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Liên kết không tồn tại!',
            ]);
        }
    }
    public function store(Request $request)
    {
        $id_chuc_nang   =   16;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $data   = $request->all();

        Danhsachtaikhoan::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới phim thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang   =   21;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $Danhsachtaikhoan   = Danhsachtaikhoan::find($request->id);
        if($Danhsachtaikhoan) {
            $data   = $request->all();
            $Danhsachtaikhoan->update($data);

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa phim thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phim không tồn tại!'
            ]);
        }
    }

    public function data()
    {
        $id_chuc_nang   =   17;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $data   = Danhsachtaikhoan::get();

        return response()->json([
            'xxx'    => $data,
        ]);
    }

    public function status(Request $request)
    {
        $id_chuc_nang   =   18;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $Danhsachtaikhoan   = Danhsachtaikhoan::find($request->id);
        // dd($Danhsachtaikhoan);
        if($Danhsachtaikhoan) {
            if($Danhsachtaikhoan->tinh_trang == 1) {
                $Danhsachtaikhoan->tinh_trang = 0;
            } else {
                $Danhsachtaikhoan->tinh_trang = 1;
            }
            $Danhsachtaikhoan->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật trạng thái!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản không tồn tại!'
            ]);
        }
    }

    public function block(Request $request)
    {
        $id_chuc_nang   =   19;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $Danhsachtaikhoan   = Danhsachtaikhoan::find($request->id);
        // dd($Danhsachtaikhoan);
        if($Danhsachtaikhoan) {
            if($Danhsachtaikhoan->is_block == 1) {
                $Danhsachtaikhoan->is_block = 0;
            } else {
                $Danhsachtaikhoan->is_block = 1;
            }
            $Danhsachtaikhoan->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật trạng thái!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản không tồn tại!'
            ]);
        }
    }

    public function info(Request $request)
    {

        $Danhsachtaikhoan   = Danhsachtaikhoan::find($request->id);
        if($Danhsachtaikhoan) {
            return response()->json([
                'status'    => 1,
                'data'      => $Danhsachtaikhoan
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản không tồn tại!'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang   =   20;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $Danhsachtaikhoan   = Danhsachtaikhoan::find($request->id);

        if($Danhsachtaikhoan) {
            $Danhsachtaikhoan->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa tài khoản thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản không tồn tại!'
            ]);
        }
    }
    public function register(Request $request)
    {
        $data                   = $request->all();
        $data['is_block']       =   0;
        $data['tinh_trang']     =   0;
        $data['password']       = bcrypt($request->password);  // Gốc 123456 -> Lưu: e10adc3949ba59abbe56e057f20f883e
        $data['thay_the_id']    = Str::uuid();
        DanhSachTaiKhoan::create($data);

        $xxx['ho_va_ten']       =   $request->ho_va_ten;
        $xxx['link']            =   'http://127.0.0.1:8000/kich-hoat-tai-khoan/' . $data['thay_the_id'];

        Mail::to($request->email)->send(new SenMail('Thông Tin kích hoạt tài khoản', 'mail.kich_hoat_tk', $xxx));
        return response()->json([
            'status'    => 1,
            'message'   => 'Đăng ký tài khoản thành công ',
        ]);
    }
     public function login(Request $request){
    //           // Thực hiện xác thực mật khẩu
    // $validator = Validator::make($request->all(), [
    //     'email' => ['required', 'email'],
    //     'password' => ['required', 'confirmed', Password::min(8)]
    // ]);

    // // Kiểm tra nếu xác thực thất bại
    // if ($validator->fails()) {
    //     return response()->json([
    //         'status' => 0,
    //         'message' => $validator->errors()->first(), // Trả lại lỗi đầu tiên
    //     ]);
    // }
        $check  = Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password]);
        if($check == true) {
            // Sau khi đã qua attempt thì $check == true    => Laravel đã cấp session
            // Lấy thông tin của người dùng nào đã đăng nhập    => Auth->user();
            $user   =   Auth::guard('client')->user();
            // Kiểm tra người dùng này đã kích hoạt mail hay chưa?  Field   -> tinh_trang
            if($user->tinh_trang == false) {
                // Laravel thu hồi session lại
                Auth::guard('client')->logout();
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản chưa xác minh mail!',
                ]);
            } else {
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã đăng nhập thành công!',
                ]);
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản hoặc mật khẩu không đúng!',
            ]);
        }
        //  $check      =   DanhSachTaiKhoan::where('email', $request->email)
        //                                 ->where('password', $request->password)
        //                                 ->first();
        // $mk_luu     =   $check->password;
        // $mk_nhap    =   $request->password;

        // if($check && password_verify($mk_nhap, $mk_luu))  {
        //     $check->tinh_trang=1;
        //     $check->save();
        //     return response()->json([
        //         'status'    => 1,
        //         'message'   => 'Đã đăng nhập thành công!',
        //     ]);
        // } else {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Tài khoản hoặc mật khẩu không đúng!',
        //     ]);
        // }
     }

}
