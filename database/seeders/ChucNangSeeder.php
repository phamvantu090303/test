<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            DB::table('chucnangs')->delete();

            DB::table('chucnangs')->truncate();

            DB::table('chucnangs')->insert([

                [
                    'ten_chuc_nang'     =>  'Thêm Mới Admin',
                    'ten_group'         =>  'Admin',
                ],
                [
                    'ten_chuc_nang'     =>  'Xem Thông Tin Admin',
                    'ten_group'         =>  'Admin',
                ],
                [
                    'ten_chuc_nang'     =>  'Thay Đổi is block  Admin',
                    'ten_group'         =>  'Admin',
                ],
                [
                    'ten_chuc_nang'     =>  'Cập Nhật Admin',
                    'ten_group'         =>  'Admin',
                ],
                [
                    'ten_chuc_nang'     =>  'Xóa Admin',
                    'ten_group'         =>  'Admin',
                ],
                [
                    'ten_chuc_nang'     =>  'Thêm Mới Sản Phẩm',
                    'ten_group'         =>  'sản phẩm',
                ],

                [
                    'ten_chuc_nang'     =>  'Đổi Trạng Thái sản phẩm',
                    'ten_group'         =>  'sản phẩm',
                ],

                [
                    'ten_chuc_nang'     =>  'Xóa sản phẩm',
                    'ten_group'         =>  'sản phẩm',
                ],
                [
                    'ten_chuc_nang'     =>  'thông tin sản phẩm',
                    'ten_group'         =>  'sản phẩm',
                ],
                [
                    'ten_chuc_nang'     =>  'Cập Nhật sản phẩm',
                    'ten_group'         =>  'sản phẩm',
                ],
                [
                    'ten_chuc_nang'     =>  'Thêm Mới Danh Mục',
                    'ten_group'         =>  'Danh Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Thông tin Danh Mục',
                    'ten_group'         =>  'Danh Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Đổi Trạng Thái Danh Mục',
                    'ten_group'         =>  'Danh Mục',
                ],

                [
                    'ten_chuc_nang'     =>  'Xóa Danh Mục',
                    'ten_group'         =>  'Danh Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Cập Nhật Danh Mục',
                    'ten_group'         =>  'Danh Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Thêm Mới Tài Khoản Khách Hàng',
                    'ten_group'         =>  'Tài Khoản Khách',
                ],
                [
                    'ten_chuc_nang'     =>  'Thông Tin Tài Khoản Khách Hàng',
                    'ten_group'         =>  'Tài Khoản Khách',
                ],
                [
                    'ten_chuc_nang'     =>  'Đổi Trạng Thái Khách Hàng',
                    'ten_group'         =>  'Tài Khoản Khách',
                ],
                [
                    'ten_chuc_nang'     =>  'Khóa Tài Khoản Khách Hàng',
                    'ten_group'         =>  'Tài Khoản Khách',
                ],
                [
                    'ten_chuc_nang'     =>  'Xóa Tài Khoản Khách Hàng',
                    'ten_group'         =>  'Tài Khoản Khách',
                ],
                [
                    'ten_chuc_nang'     =>  'Cập Nhật Tài Khoản Khách Hàng',
                    'ten_group'         =>  'Tài Khoản Khách',
                ],
                [
                    'ten_chuc_nang'     =>  'Thêm Mới Chuyên Mục',
                    'ten_group'         =>  'Chuyên Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Xóa Chuyên Mục',
                    'ten_group'         =>  'Chuyên Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Thông Tin  Chuyên Mục',
                    'ten_group'         =>  'Chuyên Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Đổi Trạng Thái Chuyên Mục',
                    'ten_group'         =>  'Chuyên Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Cập Nhật Chuyên Mục',
                    'ten_group'         =>  'Chuyên Mục',
                ],
                [
                    'ten_chuc_nang'     =>  'Thêm Mới Slide',
                    'ten_group'         =>  'Slide',
                ],
                [
                    'ten_chuc_nang'     =>  'Xóa Slide',
                    'ten_group'         =>  'Slide',
                ],
                [
                    'ten_chuc_nang'     =>  'Cập Nhật Slide',
                    'ten_group'         =>  'Slide',
                ],
                [
                    'ten_chuc_nang'     =>  'Đổi Trạng Thái Slide',
                    'ten_group'         =>  'Slide',
                ],
                [
                    'ten_chuc_nang'     =>  'Xem Thông Tin Đơn Hàng',
                    'ten_group'         =>  'Đơn Hàng',
                ],
                [
                    'ten_chuc_nang'     =>  'Xóa Đơn Hàng',
                    'ten_group'         =>  'Đơn Hàng',
                ],
                [
                    'ten_chuc_nang'     =>  'Phân Quyền',
                    'ten_group'         =>  'Phân Quyền',
                ],
            ]);

    }
}
