<?php

namespace App\Http\Controllers;

use App\Models\chuyenmuc;
use App\Models\danhmuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function index(){
   $chuyenMuc      =   chuyenmuc::get();

    return view('admin.page.danhMuc.danhmuc',compact('chuyenMuc'));

    }
}
