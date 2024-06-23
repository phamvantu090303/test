<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('danhmucs')->delete();

        DB::table('danhmucs')->truncate();

        DB::table('danhmucs')->insert([
            [
                'id_chuyen_muc'          =>  '1',
                'ten_danh_muc'          =>  "Thời Trang Nam",
                'slug_danh_muc'          => "a",
                'trang_thai'          =>  random_int(0,1),

            ],
            [
                'id_chuyen_muc'          =>  '2',
                'ten_danh_muc'          =>  "Thời Trang Nữ",
                'slug_danh_muc'          => "b",
                'trang_thai'          =>  random_int(0,1),

            ],
            [
                'id_chuyen_muc'          =>  '3',
                'ten_danh_muc'          =>  "Thời Trang Trẻ Em",
                'slug_danh_muc'          => "c",
                'trang_thai'          =>  random_int(0,1),

            ],
            [
                'id_chuyen_muc'          =>  '4',
                'ten_danh_muc'          =>  "Thời Trang Giày",
                'slug_danh_muc'          => "a",
                'trang_thai'          =>  random_int(0,1),

            ],
            [
                'id_chuyen_muc'          =>  '5',
                'ten_danh_muc'          =>  "Áo Khoát",
                'slug_danh_muc'          => "a",
                'trang_thai'          =>  random_int(0,1),

            ],
            [
                'id_chuyen_muc'          =>  '6',
                'ten_danh_muc'          =>  "Kính Mắt",
                'slug_danh_muc'          => "a",
                'trang_thai'          =>  random_int(0,1),

            ],

        ]);
    }
}
