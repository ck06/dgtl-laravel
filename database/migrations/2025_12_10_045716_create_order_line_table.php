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
        Schema::create('order_line', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('order');
            $table->unsignedBigInteger('product');
            $table->unsignedbiginteger('totalPrice')->comment('total price in cents at time of placing the order');
            $table->unsignedBigInteger('individualPrice')->comment('price in cents at time of placing the order');
            $table->integer('amount');

            $table->foreign('order')->references('id')->on('order');
            $table->foreign('product')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_line');
    }
};
