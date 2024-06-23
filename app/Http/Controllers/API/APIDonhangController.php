<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\SenMail;
use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class APIDonhangController extends Controller
{
    public function del(Request $request)
    {
        $id_chuc_nang   =   32;
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
        $donhang = donhang::find($request->id);
        if ($donhang) {
            $donhang->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa đơn hàng thành công',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Đơn hàng không tồn tại',
            ]);
        }
    }
    public function dataDonHang(Request $request)
    {
    //   dd($request->all());
        $id_khach_hang = Auth::guard('client')->user();

        if ($id_khach_hang) {
            DB::beginTransaction();

            try {
                $donHang = donhang::create([
                    'id_khach_hang' => $id_khach_hang->id,

                ]);

                $donHang->ma_don_hang = 2000 + $donHang->id;
                $donHang->save();

                //Hàm tính tổng tiền của đơn hàng
                $Tong_tien = 0;

                if ($request->has('gio_hang') && is_array($request->gio_hang)) {
                    foreach ($request->gio_hang as $item) {
                        // Kiểm tra xem thuộc tính có tồn tại và là số hay không trước khi thêm nó vào tổng số
                        if (isset($item['thanh_tien']) && is_numeric($item['thanh_tien'])) {
                            // Retrieve the existing chitietdonhang and update its attributes
                            $chitietdonhang = chitietdonhang::create([
                                'id_don_hang'         => $donHang->ma_don_hang,
                                'id_san_pham'  => $item['id_san_pham'],
                                'ten_san_pham' => $item['ten_san_pham'],

                                'hinh_anh'     => $item['hinh_anh'],
                                'mo_ta'        => $item['ghi_chu'],
                                'don_gia'      => $item['don_gia'],
                                'so_luong'     => $item['so_luong'],
                            ]);

                            $Tong_tien += $item['thanh_tien'];
                        }
                    }
                }
                $chitietdonhang->tong_tien =$Tong_tien;
                $chitietdonhang->save();

                $donHang->tong_tien = $Tong_tien;
                $donHang->save();

                $ds_don_hang        = chitietdonhang::where('id_don_hang', $donHang->ma_don_hang)
                 ->join('san_phams','chitietdonhangs.id_san_pham', 'san_phams.id' )
                 ->select('san_phams.ten_san_pham', 'chitietdonhangs.*')
                 ->get();

                $xxx['ho_va_ten']       =  $id_khach_hang->ho_va_ten;
                $xxx['ds_donhang']      =  $ds_don_hang;
                $xxx['tong_tien']       =  $Tong_tien;
                $xxx['noi_dung_ck']     =  'Mã Sản Phẩm_'. $donHang->ma_don_hang;

                Mail::to($id_khach_hang->email)->send(new SenMail('Thông Tin Đặt Sản Phẩm', 'mail.dat_ve', $xxx));

                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Thành công!',
                ]);
            } catch (Exception $e) {
                Log::error($e);
                DB::rollBack();

                return response()->json([
                    'status' => 0,
                    'message' => 'Có lỗi xảy ra',
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Chức năng này yêu cầu phải đăng nhập',
            ]);
        }
    }
    public function data()
    {
        $data = donhang::join('danhsachtaikhoans', 'donhangs.id_khach_hang', 'danhsachtaikhoans.id')
            ->select('donhangs.*', 'danhsachtaikhoans.ho_va_ten')
            ->get();
        return response()->json([
            'data'  => $data,
        ]);
    }
    public function dataChiTietDonHang(Request $request)
    {
        $id_chuc_nang   =   31;
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
        $ma_don_hang=$request->ma_don_hang;
        $data = chitietdonhang::join('donhangs', 'chitietdonhangs.id_don_hang', 'donhangs.ma_don_hang')
                                ->join('san_phams', 'chitietdonhangs.id_san_pham', 'san_phams.id')
            ->where('donhangs.ma_don_hang', $ma_don_hang)
            ->select('chitietdonhangs.*','san_phams.ten_san_pham')
            ->get();

        return response()->json([
            'data'  => $data,
        ]);
    }
}
