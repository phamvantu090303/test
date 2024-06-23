<?php

namespace App\Http\Controllers;

use App\Models\Danhsachtaikhoan;
use Illuminate\Http\Request;

class DanhsachtaikhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexVue()
    {
        return view('admin.page.danhsachtaikhoan.listdanhsach');
    }

}
