<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuyenController extends Controller
{
    public function indexQuyen()
    {
        return view('admin.page.quyen.quyen');
    }
}
