<?php

namespace App\Http\Controllers;

use App\Models\chuyenmuc;
use Illuminate\Http\Request;

class ChuyenmucController extends Controller
{

    public function index()
    {
        return view('admin.page.chuyenMuc.chuyenmuc');
    }


}
