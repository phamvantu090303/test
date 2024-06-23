<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\danhmuc;
use App\Models\QuyenChucNang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APISanPhamController extends Controller
{

    public function store(Request $request)
    {
        $id_chuc_nang   =   6;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $data = $request->all();
        SanPham::create($data);
        return response()->json([
            'status'    => 1,
            'message'   => 'them moi thanh cong',
        ]);
    }

    public function status(Request $request)
    {
        $id_chuc_nang   =   7;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $sanpham   = SanPham::find($request->id);
        if ($sanpham) {
            if ($sanpham->trang_thai == 1) {
                $sanpham->trang_thai = 0;
            } else {
                $sanpham->trang_thai = 1;
            }
            $sanpham->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật trạng thái!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'San Pham không tồn tại!'
            ]);
        }
    }

    public function del(Request $request)
    {
        $id_chuc_nang   =   8;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $sanpham = SanPham::find($request->id);
        if ($sanpham) {
            $sanpham->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'da xoa san pham thanh cong',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'san pham ko ton tai',
            ]);
        }
    }

    public function data()
    {
        $id_chuc_nang   =   9;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $data       =   SanPham::join('danhmucs', 'danhmucs.id', 'san_phams.id_danh_muc')
            ->select('san_phams.*', 'danhmucs.ten_danh_muc')
            ->get();
        $danhmuc   =   danhmuc::where('trang_thai', 1)
            ->get();
        return response()->json([
            'data'      =>  $data,
            'danhmuc'   =>  $danhmuc,

        ]);
    }

    public function Update(Request $request)
    {
        $id_chuc_nang   =   10;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }
        $sanpham = SanPham::find($request->id);
        if ($sanpham) {
            $data = $request->all();
            $sanpham->update($data);
            return response()->json([
                'status'    => 1,
                'message'   => 'them moi thanh cong',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => ' không tồn tại!'
            ]);
        }
    }
}
