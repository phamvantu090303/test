<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhangs';

    protected $fillable = [
        'id_san_pham',
        'id_don_hang',
        'so_luong',
        'hinh_anh',
        'mo_ta',
        'don_gia',
        'trang_thai',
        'tong_tien'
    ];
}
