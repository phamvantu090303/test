<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use Illuminate\Http\Request;

class APIHomeController extends Controller
{
    public function getIdFilmDetail(Request $request)
    {
         $data=SanPham::find($request->id);
         return response()->json([
            'data'   => $data,
         ]);
    }
}
