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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis untuk pengguna
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Alamat email unik untuk login
            $table->timestamp('email_verified_at')->nullable(); // Tanggal dan waktu verifikasi email
            $table->string('password'); // Sandi terenkripsi untuk login
            $table->rememberToken(); // Token untuk fitur "ingat saya"
            $table->timestamps(); // Waktu pembuatan dan pembaruan data pengguna
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
