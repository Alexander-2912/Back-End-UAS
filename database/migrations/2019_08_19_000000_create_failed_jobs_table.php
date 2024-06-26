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
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis untuk identifikasi unik
            $table->string('uuid')->unique(); // UUID unik untuk setiap pekerjaan gagal
            $table->text('connection'); // Nama koneksi untuk pekerjaan
            $table->text('queue'); // Nama antrian dimana pekerjaan ditugaskan
            $table->longText('payload'); // Payload dari pekerjaan yang gagal
            $table->longText('exception');// Detail exception dari pekerjaan yang gagal
            $table->timestamp('failed_at')->useCurrent(); // Timestamp kapan pekerjaan gagal terjadi
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
};
