<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietgiohang extends Model
{
    use HasFactory;
    protected $table = 'chitietgiohangs';

    protected $fillable = [
        'id_san_pham',
        'id_khach_hang',
        'ghi_chu',
        'so_luong',
        'thanh_tien',
        'trang_thai',
        'don_gia'
    ];
}
