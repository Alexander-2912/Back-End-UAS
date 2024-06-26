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
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis untuk identifikasi unik
            $table->string('customer_name'); // Nama pelanggan
            $table->string('phone_number'); // Nomor telepon pelanggan
            $table->string('service_name'); // Nama layanan
            $table->string('service_code'); // Kode layanan
            $table->integer('price'); // Harga layanan
            $table->date('date'); // Tanggal layanan diberikan
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            // Foreign key untuk menautkan ke pengguna yang memberikan layanan, dengan cascade on delete dan update

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
        Schema::dropIfExists('services');
    }
};
