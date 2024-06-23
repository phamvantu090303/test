<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;
    protected $table = 'donhangs';

    protected $fillable = [
        'id_khach_hang',
        'ma_don_hang',
        'is_thanh_toan',
        'tong_tien',
    ];
}
