<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewLogin(){
        return view('admin.login');
    }
    public function index(){

        return view('admin.page.admin.index');
    }

}
