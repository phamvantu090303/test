<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMucSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('chuyenmucs')->delete();

        DB::table('chuyenmucs')->truncate();

        DB::table('chuyenmucs')->insert([
            [
                'ten_chuyen_muc'          =>  'Thời Trang Nam',
                'slug_chuyen_muc'          =>  "thoi-trang-nam",
                'icon_chuyen_muc'          => "a",
                'tinh_trang'          =>  random_int(0,1),

            ],
            [
                'ten_chuyen_muc'          =>  'Thời Trang Nữ',
                'slug_chuyen_muc'          =>  "thoi-trang-nữ",
                'icon_chuyen_muc'          => "b",
                'tinh_trang'          =>  random_int(0,1),

            ],
            [
                'ten_chuyen_muc'          =>  'Thời Trang Baby',
                'slug_chuyen_muc'          =>  "thoi-trang-tre-em",
                'icon_chuyen_muc'          => "c",
                'tinh_trang'          =>  random_int(0,1),

            ],
            [
                'ten_chuyen_muc'          =>  'Thời Trang Giày',
                'slug_chuyen_muc'          =>  "giay-thoi-trang",
                'icon_chuyen_muc'          => "d",
                'tinh_trang'          =>  random_int(0,1),

            ],
            [
                'ten_chuyen_muc'          =>  'Áo Khoát',
                'slug_chuyen_muc'          =>  "Áo Khoát",
                'icon_chuyen_muc'          => "e",
                'tinh_trang'          =>  random_int(0,1),

            ],
            [
                'ten_chuyen_muc'          =>  'Thời Trang kinh mắt',
                'slug_chuyen_muc'          =>  "Kinh",
                'icon_chuyen_muc'          => "f",
                'tinh_trang'          =>  random_int(0,1),

            ],


        ]);
    }
}
