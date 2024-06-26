<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_items', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis untuk identifikasi unik
            $table->string('buyer_name'); // Nama pembeli
            $table->string('phone_number'); // Nomor telepon pembeli
            $table->string('product_name'); // Nama produk yang dijual
            $table->string('product_code');  // Kode produk yang dijual
            $table->integer('quantity'); // Jumlah produk yang dijual
            $table->decimal('price', 10, 2); // Contoh: decimal dengan 10 digit total dan 2 digit di belakang koma
            $table->date('date'); // Tanggal penjualan
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
 // Foreign key untuk menautkan ke pengguna yang menjual produk, dengan cascade on delete dan update
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sold_items');
    }
};
