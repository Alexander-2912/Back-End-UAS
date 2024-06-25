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
            $table->id();
            $table->string('buyer_name');
            $table->string('phone_number');
            $table->string('product_name');
            $table->string('product_code');
            $table->integer('quantity');
            $table->decimal('price', 10, 2); // Contoh: decimal dengan 10 digit total dan 2 digit di belakang koma
            $table->date('date');
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
