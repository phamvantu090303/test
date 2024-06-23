<?php

use App\Http\Controllers\API\APIAdminComtroller;
use App\Http\Controllers\API\APIChiTietGioHangController;
use App\Http\Controllers\API\APIChuyenMucController;
use App\Http\Controllers\API\APIDanhMucController;
use App\Http\Controllers\API\APIDanhSachTaiKhoanController;
use App\Http\Controllers\API\APIDonhangController;
use App\Http\Controllers\API\APIHomeController;
use App\Http\Controllers\API\APIQuyenController;
use App\Http\Controllers\API\APISanPhamController;
use App\Http\Controllers\API\APISlideController;
use App\Http\Controllers\APIAdminController;
use App\Http\Controllers\DetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/admin/login', [APIAdminComtroller::class, 'Adminlogin'])->name('adminLogin');
Route::post('/register', [APIDanhSachTaiKhoanController::class, 'register'])->name('register');
Route::post('/login', [APIDanhSachTaiKhoanController::class, 'login'])->name('login');
Route::post('/getID/film-detail', [APIHomeController::class, 'getIdFilmDetail'])->name('getIdFilmDetail');
Route::post('/reset-password', [APIDanhSachTaiKhoanController::class, 'resetPassword'])->name('resetPassword');
Route::post('/doi-mat-khau', [APIDanhSachTaiKhoanController::class, 'doiMatKhau'])->name('doiMatKhau');

Route::group(['prefix'  =>  '/admin'], function () {
    Route::post('/create', [APIAdminComtroller::class, 'store'])->name('adminStore');
    Route::post('/data', [APIAdminComtroller::class, 'data'])->name('adminData');
    Route::post('/del', [APIAdminComtroller::class, 'destroy'])->name('adminDel');
    Route::post('/update', [APIAdminComtroller::class, 'update'])->name('adminUpdate');
    Route::post('/block', [APIAdminComtroller::class, 'block'])->name('taiKhoanAdminBlock');

});

Route::group(['prefix'  =>  '/san-pham'], function () {
    Route::post('/data', [APISanPhamController::class, 'data'])->name('sanphamData');
    Route::post('/creat', [APISanPhamController::class, 'store'])->name('sanphamStore');
    Route::post('/update', [APISanPhamController::class, 'Update'])->name('sanphamupdate');
    Route::post('/del', [APISanPhamController::class, 'del'])->name('sanphamDel');
    Route::post('/status', [APISanPhamController::class, 'status'])->name('sanphamStatus');
});
Route::group(['prefix'  =>  '/danh-muc'], function () {
    Route::post('/data', [APIDanhMucController::class, 'data'])->name('danhmucData');
    Route::post('/creat', [APIDanhMucController::class, 'store'])->name('danhmucStore');
    Route::post('/update', [APIDanhMucController::class, 'Update'])->name('danhmucupdate');
    Route::post('/del', [APIDanhMucController::class, 'del'])->name('danhmucDel');
    Route::post('/status', [APIDanhMucController::class, 'status'])->name('danhmucStatus');
});
Route::group(['prefix'  =>  '/chuyen-muc'], function () {
    Route::post('/data', [APIChuyenMucController::class, 'data'])->name('chuyenMucData');
    Route::post('/creat', [APIChuyenMucController::class, 'store'])->name('chuyenMucStore');
    Route::post('/update', [APIChuyenMucController::class, 'Update'])->name('chuyenMucupdate');
    Route::post('/del', [APIChuyenMucController::class, 'del'])->name('chuyenMucDel');
    Route::post('/status', [APIChuyenMucController::class, 'status'])->name('chuyenMucStatus');
});
Route::group(['prefix'  =>  '/slide'], function () {
    Route::post('/data', [APISlideController::class, 'data'])->name('SlideData');
    Route::post('/creat', [APISlideController::class, 'store'])->name('SlideStore');
    Route::post('/update', [APISlideController::class, 'Update'])->name('Slideupdate');
    Route::post('/del', [APISlideController::class, 'destroy'])->name('SlideDel');
    Route::post('/status', [APISlideController::class, 'status'])->name('SlideStatus');
});
Route::group(['prefix'  =>  '/don-hang'], function () {
    Route::post('/data-don-hang', [APIDonhangController::class, 'dataDonHang'])->name('dataDonHang');
    Route::post('/data', [APIDonhangController::class, 'data'])->name('data');
    Route::post('/data-chi-tiet-don-hang', [APIDonHangController::class, 'dataChiTietDonHang'])->name('dataChiTietDonHang');
    Route::post('/del', [APIDonhangController::class, 'del'])->name('Delchitietdonhang');
});
Route::group(['prefix'  =>  '/danh-sach-tai-khoan'], function () {
    Route::post('/create', [APIDanhSachTaiKhoanController::class, 'store'])->name('taiKhoanStore');
    Route::post('/search', [APIDanhSachTaiKhoanController::class, 'search'])->name('taiKhoanSearch');
    Route::post('/data', [APIDanhSachTaiKhoanController::class, 'data'])->name('taiKhoanData');
    Route::post('/status', [APIDanhSachTaiKhoanController::class, 'status'])->name('taiKhoanStatus');
    Route::post('/block', [APIDanhSachTaiKhoanController::class, 'block'])->name('taiKhoanBlock');
    Route::post('/info', [APIDanhSachTaiKhoanController::class, 'info'])->name('taiKhoanInfo');
    Route::post('/del', [APIDanhSachTaiKhoanController::class, 'destroy'])->name('taiKhoanDel');
    Route::post('/update', [APIDanhSachTaiKhoanController::class, 'update'])->name('taiKhoanUpdate');
});

Route::group(['prefix'  =>  '/Chi-tiet-gio-hang'], function () {
    Route::post('/giohang', [APIChiTietGioHangController::class, 'store'])->name('chitietgiohang');
    Route::get('/data', [APIChiTietGioHangController::class, 'data'])->name('datagiohang');
    Route::post('/del', [APIChiTietGioHangController::class, 'del'])->name('delgionhang');
    Route::post('/update', [APIChiTietGioHangController::class, 'update'])->name('updateGiohang');
});

Route::group(['prefix'  =>  '/quyen'], function() {
    Route::post('/data-quyen', [APIQuyenController::class, 'dataQuyen'])->name('dataQuyen');
    Route::post('/data-chuc-nang', [APIQuyenController::class, 'dataChucNang'])->name('dataChucNang');
    Route::post('/create', [APIQuyenController::class, 'store'])->name('quyenStore');
    Route::post('/update', [APIQuyenController::class, 'update'])->name('quyenUpdate');
    Route::post('/delete', [APIQuyenController::class, 'destroy'])->name('quyenDelete');
    Route::post('/status', [APIQuyenController::class, 'status'])->name('quyenStatus');
    Route::post('/phan-quyen', [APIQuyenController::class, 'phanQuyen'])->name('phanQuyen');
});
