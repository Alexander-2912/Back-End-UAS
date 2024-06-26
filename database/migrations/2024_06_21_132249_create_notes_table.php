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
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis untuk identifikasi unik
            $table->text('description'); // Deskripsi catatan
            $table->date('date'); // Tanggal catatan dibuat
            $table->boolean('important')->default(false); // Tambahkan field important
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
                        // Foreign key untuk menautkan ke pengguna yang memiliki catatan, dengan cascade on delete dan update

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
        Schema::dropIfExists('notes');
    }
};
