<?php

namespace App\Http\Controllers;

use App\Models\chuyenmuc;
use App\Models\danhmuc;
use App\Models\SanPham;
use App\Models\slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrangChuController extends Controller
{
    public function index(){

        $thoi_trang_nu = SanPham::join('danhmucs', 'san_phams.id_danh_muc', 'danhmucs.id')->where('san_phams.trang_thai', 1)
        ->where("danhmucs.trang_thai", 1)
        ->where("danhmucs.id", 2)
        ->select('san_phams.*')
        ->get();
        $thoi_trang_nam = SanPham::join('danhmucs', 'san_phams.id_danh_muc', 'danhmucs.id')->where('san_phams.trang_thai', 1)
        ->where("danhmucs.trang_thai", 1)
        ->where("danhmucs.id", 1)
        ->select('san_phams.*')
        ->get();
        $BaBy = SanPham::join('danhmucs', 'san_phams.id_danh_muc', 'danhmucs.id')->where('san_phams.trang_thai', 1)
        ->where("danhmucs.trang_thai", 1)
        ->where("danhmucs.id", 3)
        ->select('san_phams.*')
        ->get();

        // dd($thoi_trang_nu->toArray());

        $slide  =   slide::where('tinh_trang', 1)
                    ->get();
        return view('client.page.homepage.newhome',compact('thoi_trang_nu','thoi_trang_nam','slide','BaBy'));
    }


}
