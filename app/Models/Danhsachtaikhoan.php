<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Danhsachtaikhoan extends Authenticatable
{
    use HasFactory;
    protected $table = 'danhsachtaikhoans';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'so_dien_thoai',
        'password',
        'ngay_sinh',
        'dia_chi',
        'is_block',
        'tinh_trang',
        'thay_the_id',
        'ma_doi_mat_khau',

    ];
}
