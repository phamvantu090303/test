<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\chuyenmuc;
use App\Models\QuyenChucNang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIChuyenMucController extends Controller
{
    public function data()
    {
        $id_chuc_nang   =   24;
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
        $data = chuyenmuc::get();
        return response()->json([
            'data'   => $data,
        ]);
    }
    public function store(Request $request)
    {
        $id_chuc_nang   =   22;
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
        chuyenmuc::create($data);
        return response()->json([
            'status'    => 1,
            'message'   => 'them moi thanh cong',
        ]);
    }
    public function Update(Request $request)
    {
        $id_chuc_nang   =   26;
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
        $chuyenmuc = chuyenmuc::find($request->id);
        if($chuyenmuc) {
            $data = $request->all();
            $chuyenmuc->update($data);
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
        $id_chuc_nang   =   23;
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
       $chuyenmuc=chuyenmuc::find($request->id);
        if($chuyenmuc){
            $chuyenmuc->delete();
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
        $id_chuc_nang   =   25;
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
        $chuyenmuc   = chuyenmuc::find($request->id);
        if($chuyenmuc) {
            if($chuyenmuc->tinh_trang == 1) {
                $chuyenmuc->tinh_trang = 0;
            } else {
                $chuyenmuc->tinh_trang = 1;
            }
            $chuyenmuc->save();

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
