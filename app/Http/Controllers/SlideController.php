<?php

namespace App\Http\Controllers;

use App\Models\slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.page.slideweb.slide');
    }


}
