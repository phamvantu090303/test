<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\chitietgiohang;
use App\Models\donhang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIChiTietGioHangController extends Controller
{
    public function store(Request $request){
        $id_khach_hang = Auth::guard('client')->user()->id;
        $data     = SanPham::find($request->id);
        if ($data) {
            //kiểm tra thử sản phẩm đó có trong giỏ hàng chưa
            //nếu có
            $chiTiet = chitietgiohang::where('id_san_pham', $request->id)
                                    ->where('trang_thai', 0)
                                    ->where('id_khach_hang', $id_khach_hang)
                                    ->first();
            if($chiTiet){
                $chiTiet->so_luong = $chiTiet->so_luong + $request->soluong;
                $chiTiet->thanh_tien = $chiTiet->don_gia * $chiTiet->so_luong;
                $chiTiet->save();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'them vao thanh cong'

                ]);
                //nếu chưa có
            }else{
                chitietgiohang::create([
                    'id_san_pham'     =>  $request->id,
                    'id_khach_hang'            =>$id_khach_hang,
                    'ghi_chu'    =>$data->mo_ta,
                    'so_luong'             => $request->soluong,
                    'thanh_tien'            =>$data->don_gia*$request->soluong,
                    'don_gia'            =>$data->don_gia,

                ]);

                return response()->json([
                    'status'    => 1,
                    'message'   => 'them vao gio hang thanh cong'

                ]);
            }

        } else {
            return response()->json([
                'status'    => 0,
                'message'   => ' không tồn tại!'
            ]);
        }

    }
    public function data()
    {
        $id_khach_hang = Auth::guard('client')->user()->id;

        $data = chitietgiohang::join('san_phams', 'san_phams.id', 'chitietgiohangs.id_san_pham')
            ->where('chitietgiohangs.id_khach_hang', $id_khach_hang)
            ->where('chitietgiohangs.trang_thai', 0)
            ->select('chitietgiohangs.*', 'san_phams.hinh_anh', 'san_phams.ten_san_pham')
            ->get();

        // Calculate the total price
         $totalPrice = $data->sum('thanh_tien');

            return response()->json([
                'data'       => $data,
                'xxx' => $totalPrice,
            ]);
            // dd($totalPrice->all());
    }
    public function del(Request $request){
        $sanpham = chitietgiohang::find($request->id);
        if ($sanpham) {
            $sanpham->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'bạn đã xóa sản phẩm thành công',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'sản phẩm không tồn tại',
            ]);
        }
    }
    public function update(Request $request){
        $sanpham = chitietgiohang::find($request->id);
        if($sanpham) {
            $data = $request->all();
            $sanpham->update($data);
            $sanpham->thanh_tien= $sanpham->don_gia*$request->so_luong;

            $sanpham->save();
            return response()->json([
                'status'    => 1,
                'message'   => 'cap nhat thanh cong',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => ' không tồn tại!'
            ]);
        }
    }
}
