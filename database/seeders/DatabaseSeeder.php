<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\chuyenmuc;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {
        Schema::disableForeignKeyConstraints();
        $this->call(SanphamSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DanhSachTaiKhoanSeeder::class);
        $this->call(SlideSeeder::class);
        $this->call(ChuyenMucSeeder::class);
        $this->call(DanhMucSeeder::class);
        $this->call(ChucNangSeeder::class);
        $this->call(QuyenChucNangSeeder::class);
        $this->call(PhanQuyenSeeder::class);
    }
}
