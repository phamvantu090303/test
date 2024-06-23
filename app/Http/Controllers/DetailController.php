<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(){
        $allsanpham = SanPham::where('trang_thai', 1)->get();

        return view('client.page.detailSanPham.detail', compact('allsanpham'));
    }
}
