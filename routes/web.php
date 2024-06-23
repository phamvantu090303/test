<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChuyenmucController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DanhsachtaikhoanController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\TrangChuController;
use App\Models\Danhsachtaikhoan;
use Illuminate\Support\Facades\Route;


Route::get('/view', [TextController::class, 'view']);
Route::get('/mail-3', [TextController::class, 'mail_3']);
//kích hoạt tài khoản
Route::get('/kich-hoat-tai-khoan/{id}', [TextController::class, 'kichhoat']);
Route::get('/doi-mat-khau/{id}', [TextController::class, 'doiMatKhau']);
Route::get('/forgot-password', [TextController::class, 'viewForgotPassword']);
Route::get('/change-password', [TextController::class, 'viewChangePassword']);
//đăng xuất nick khách hàng
Route::get('/logout', [LoginController::class, 'logout']);

//đăng xuất nick admin
Route::get('/logoutAdmin', [LoginController::class, 'logoutAdmin']);
//Trang chủ
Route::get('/', [TrangChuController::class, 'index']);
//login nick khách hàng
Route::get('/login', [LoginController::class, 'login']);

//login Admin
Route::get('/admin/login', [AdminController::class, 'viewLogin']);


Route::get('/giay-phukien', [SanPhamController::class, 'spgiay']);
Route::get('/ao-khoat', [SanPhamController::class, 'aokhoat']);
Route::get('/thoi-trang-kinh-mat', [SanPhamController::class, 'kinhmat']);

Route::get('/chi-tiet-don-hang', [SanPhamController::class, 'index1']);
Route::get('/film-detail/{id}', [DetailController::class, 'index'])->middleware('WebClient');

Route::group(['prefix'  =>  '/', 'middleware' => 'WebAdmin'], function () {
    Route::get('/quyen', [QuyenController::class, 'indexQuyen']);
    Route::get('/slide', [SlideController::class, 'index']);
    Route::get('/sanpham', [SanPhamController::class, 'index']);
    Route::get('/donhang', [DonHangController::class, 'buy']);
    Route::get('/danhmuc', [DanhMucController::class, 'index']);
    Route::get('/chuyenmuc', [ChuyenmucController::class, 'index']);
    Route::get('/danhsachtaikhoan', [DanhsachtaikhoanController::class, 'indexVue']);
    Route::get('/taikhoanAdmin', [AdminController::class, 'index']);
});
//login facebook

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('login-by-fb');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

//login google

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login-by-gg');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('logoutgg', [GoogleController::class, 'logout']);
