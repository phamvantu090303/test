<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('slides')->delete();

        DB::table('slides')->truncate();

        DB::table('slides')->insert([
            [
                'ten_slide'          =>  'thời trang',
                'hinh_anh'          =>  "https://top10thuduc.net/wp-content/uploads/2021/12/shop-quan-ao-nhat-ban-tphcm-sakura-fashion.jpg",
                'tinh_trang'          =>  random_int(0,1),

            ],
            [
                'ten_slide'          =>  'thời trang nổi bật',
                'hinh_anh'          =>  "https://th.bing.com/th/id/OIP.U_PEHWQlDhrx6LL9wFB1vwHaHa?pid=ImgDet&rs=1",
                'tinh_trang'          =>  random_int(0,1),

            ],
            [
                'ten_slide'          =>  'thời trang thế giới',
                'hinh_anh'          =>  "https://th.bing.com/th/id/OIP.OsqG0AaOnofLUvDyT3UlcAHaHa?pid=ImgDet&w=1268&h=1268&rs=1",
                'tinh_trang'          =>  random_int(0,1),

            ],
        ]);
    }
}
