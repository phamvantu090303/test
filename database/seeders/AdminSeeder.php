<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->delete();

        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            [
                'username'          =>  'admin',
                'email'             =>  "admin@master.com",
                'password'          =>  bcrypt(123456),
                'ho_va_ten'         =>  "Admin",
                'id_quyen'          =>  0,
                'ngay_sinh'         =>  "2001-05-04",
                'que_quan'          =>  "Đà Nẵng",
                'so_dien_thoai'     =>  "0333314445",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  060701023012,
                'is_block'          =>  0,
            ],
            [
                'username'          =>  'PhamVanTu',
                'email'             =>  "phamtu0903030@gmail.com",
                'password'          =>  bcrypt(123456),
                'ho_va_ten'         =>  "Phạm Văn Tư",
                'id_quyen'          =>  2,
                'ngay_sinh'         =>  "2003-03-09",
                'que_quan'          =>  "Bình Định",
                'so_dien_thoai'     =>  "0413421322",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  06051023113,
                'is_block'          =>  random_int(0, 1),
            ],
            [
                'username'          =>  'NguyenTrungHung',
                'email'             =>  "hhuhnhg@gmail.com",
                'password'          =>  bcrypt(123456),
                'ho_va_ten'         =>  "Nguyễn Trung Hùng",
                'id_quyen'          =>  1,
                'ngay_sinh'         =>  "2001-03-12",
                'que_quan'          =>  "Bình Định",
                'so_dien_thoai'     =>  "0321313122",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  06051023113,
                'is_block'          =>  random_int(0, 1),
            ],
            [
                'username'          =>  'TranDangHuy',
                'email'             =>  "trandanghuy090303@gmail.com",
                'password'          =>  bcrypt(123456),
                'ho_va_ten'         =>  "Trần Đang Huy",
                'id_quyen'          =>  1,
                'ngay_sinh'         =>  "2001-03-01",
                'que_quan'          =>  "Đà Nẵng",
                'so_dien_thoai'     =>  "0931333312",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  06051023133,
                'is_block'          =>  random_int(0, 1),
            ],
        ]);
    }
}
