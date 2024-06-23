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
        Schema::create('chuyenmucs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chuyen_muc');
            $table->string('slug_chuyen_muc');
            $table->string('icon_chuyen_muc');
            $table->integer('tinh_trang')->comment('0: Ko Hiển Thị Trang Chủ, 1: Hiển Thị');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyenmucs');
    }
};
