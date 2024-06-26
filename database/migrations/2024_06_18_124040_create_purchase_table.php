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
        Schema::create('purchase', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis untuk identifikasi unik
            $table->string('sellerName'); // Nama penjual
            $table->integer('phoneNumber'); // Nomor telepon penjual
            $table->string('productName'); // Nama produk yang dibeli
            $table->string('productCode'); // Kode produk
            $table->integer('quantity'); // Jumlah barang yang dibeli
            $table->integer('price'); // Harga per unit produk
            $table->date('date'); // Tanggal transaksi
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
 // Foreign key untuk menautkan ke pengguna yang melakukan pembelian, dengan cascade on delete dan update
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
        Schema::dropIfExists('purchase');
    }
};
