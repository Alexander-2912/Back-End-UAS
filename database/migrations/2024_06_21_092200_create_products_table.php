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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis untuk identifikasi unik
            $table->string('product_name'); // Nama produk
            $table->string('product_code')->unique(); // Kode produk, harus unik
            $table->integer('quantity'); // Jumlah produk yang tersedia
            $table->integer('price'); // Harga per unit produk
            $table->date('date'); // Tanggal produk ditambahkan
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
// Foreign key untuk menautkan ke pengguna yang menambahkan produk, dengan cascade on delete dan update
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
        Schema::dropIfExists('products');
    }
};
