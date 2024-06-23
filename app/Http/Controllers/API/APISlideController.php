<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\QuyenChucNang;
use App\Models\slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APISlideController extends Controller
{

    public function store(Request $request)
    {
        $id_chuc_nang   =   27;
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
        $data   = $request->all();

        slide::create($data);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới dịch vụ thành công!',
        ]);
    }

    public function data(Request $request)
    {

        $data   = slide::all();

        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang   =   28;
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
        $slide     =   slide::find($request->id);

        if($slide) {
            $slide->delete();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa dịch vụ thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dịch vụ không tồn tại!',
            ]);
        }
    }

    public function update(Request $request)
    {
        $id_chuc_nang   =   29;
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
        $slide     =   slide::find($request->id);
        if($slide) {
            $data   = $request->all();
            $slide->update($data);

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật dịch vụ thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dịch vụ không tồn tại!',
            ]);
        }
    }

    public function status(Request $request)
    {
        $id_chuc_nang   =   30;
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
        $slide     =   slide::find($request->id);
        if($slide) {
            $slide->tinh_trang     =   $slide->tinh_trang == 1 ? 0 : 1;
            $slide->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật dịch vụ thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dịch vụ không tồn tại!',
            ]);
        }
    }


}
