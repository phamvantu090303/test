<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';

    protected $fillable = [
        'id_danh_muc',
       'ten_san_pham',
       'slug_san_pham',
       'hinh_anh',
        'don_gia',
        'mo_ta',
        'trang_thai',
    ];
}
