<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\chuyenmuc;
use App\Models\danhmuc;
use App\Models\QuyenChucNang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIDanhMucController extends Controller
{
    public function data()
    {
        $id_chuc_nang   =   12;
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
        $data           =   danhmuc::join('chuyenmucs', 'danhmucs.id_chuyen_muc', 'chuyenmucs.id')
        ->select('danhmucs.*', 'chuyenmucs.ten_chuyen_muc')
        ->get();
        $chuyenmuc =  chuyenmuc::where('tinh_trang', 1)
           ->get();
        return response()->json([
            'data'   => $data,
            'chuyenmuc'   => $chuyenmuc,

        ]);
    }
    public function store(Request $request)
    {
        $id_chuc_nang   =   11;
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
        $data = $request->all();
        danhmuc::create($data);
        return response()->json([
            'status'    => 1,
            'message'   => 'them moi thanh cong',
        ]);
    }
    public function Update(Request $request)
    {
        $id_chuc_nang   =   15;
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
        $danhmuc = danhmuc::find($request->id);
        if($danhmuc) {
            $data = $request->all();
            $danhmuc->update($data);
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
    public function del(Request $request){
        $id_chuc_nang   =   14;
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
       $danhmuc=danhmuc::find($request->id);
        if($danhmuc){
            $danhmuc->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'da xoa san pham thanh cong',
            ]);
        }else{
            return response()->json([
                'status'    => 0,
                'message'   => 'san pham ko ton tai',
            ]);
        }
    }
    public function status(Request $request){
        $id_chuc_nang   =   13;
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
        $danhmuc   = danhmuc::find($request->id);
        if($danhmuc) {
            if($danhmuc->trang_thai == 1) {
                $danhmuc->trang_thai = 0;
            } else {
                $danhmuc->trang_thai = 1;
            }
            $danhmuc->save();

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
}
