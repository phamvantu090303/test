<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function buy(){
        return view('admin.page.don_hang.donhang');
    }
}
