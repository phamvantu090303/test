<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chucnang extends Model
{
    use HasFactory;
    protected $table = 'chucnangs';

    protected $fillable = [
        'ten_chuc_nang',
        'ten_group'
    ];
}
