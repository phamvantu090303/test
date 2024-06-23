<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{

    public function index()
    {
       return view('admin.page.SanPham.index');
    }
    public function index1()
    {
       return view('client.page.ChiTiet.chitietgiohang');
    }

    // giao diện nằm trong mục homepage
    public function spgiay()
    {
        $giay = SanPham::join('danhmucs', 'san_phams.id_danh_muc', 'danhmucs.id')->where('san_phams.trang_thai', 1)
        ->where("danhmucs.trang_thai", 1)
        ->where("danhmucs.id", 4)
        ->select('san_phams.*')
        ->get();
       return view('client.page.homepage.giaythethao',compact('giay'));
    }
    public function aokhoat()
    {
        $noithat = SanPham::join('danhmucs', 'san_phams.id_danh_muc', 'danhmucs.id')->where('san_phams.trang_thai', 1)
        ->where("danhmucs.trang_thai", 1)
        ->where("danhmucs.id", 5)
        ->select('san_phams.*')
        ->get();
       return view('client.page.homepage.aokhoat',compact('noithat'));
    }
    public function kinhmat()
    {
        $kinh = SanPham::join('danhmucs', 'san_phams.id_danh_muc', 'danhmucs.id')->where('san_phams.trang_thai', 1)
        ->where("danhmucs.trang_thai", 1)
        ->where("danhmucs.id", 6)
        ->select('san_phams.*')
        ->get();
       return view('client.page.homepage.kinhmat',compact('kinh'));
    }


}
