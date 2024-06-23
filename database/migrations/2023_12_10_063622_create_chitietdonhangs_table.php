<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chitietdonhangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_san_pham');
            $table->integer('id_don_hang');
            $table->integer('so_luong');
            $table->string('hinh_anh');
            $table->string('mo_ta');
            $table->integer('don_gia');
            $table->integer('trang_thai')->default(0);
            $table->integer('tong_tien')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitietdonhangs');
    }
};
