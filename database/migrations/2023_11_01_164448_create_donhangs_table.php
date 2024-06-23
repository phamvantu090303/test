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
        Schema::create('donhangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khach_hang');
            $table->integer('ma_don_hang')->nullable();
            $table->integer('is_thanh_toan')->default(0);
            $table->integer('tong_tien')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhangs');
    }
};
