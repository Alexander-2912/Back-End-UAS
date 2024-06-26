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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis untuk identifikasi unik
            $table->morphs('tokenable'); // Polimorfik relasi untuk menunjuk ke model pengguna atau entitas lainnya
            $table->string('name'); // Nama token
            $table->string('token', 64)->unique(); // Nilai token unik
            $table->text('abilities')->nullable(); // Kemampuan (permissions) yang dimiliki oleh token
            $table->timestamp('last_used_at')->nullable(); // Timestamp terakhir kali token digunakan
            $table->timestamp('expires_at')->nullable(); // Timestamp kapan token akan kedaluwarsa
            $table->timestamps();// Timestamp kapan token dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
