<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuyenmuc extends Model
{
    use HasFactory;
    protected $table = 'chuyenmucs';

    protected $fillable = [
        'ten_chuyen_muc',
        'slug_chuyen_muc',
        'icon_chuyen_muc',
        'tinh_trang',
    ];
}
