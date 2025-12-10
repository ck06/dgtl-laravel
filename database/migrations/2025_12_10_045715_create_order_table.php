<?php

use App\Models\Order;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('ordered_at')->comment('date of purchase order')->nullable();
            $table->unsignedBigInteger('ordered_by_id');

            // this pattern will likely change if the webshop pops off, so a string allows the most flexibility.
            // this is just for display purposes; the autoincrement id will be used for internal relations.
            $table->string('order_number')->comment('pattern: year followed by 5 digit order number');
            $table->enum('status', [
                Order::STATUS_OPEN,
                Order::STATUS_PAID,
                Order::STATUS_DONE,
            ])->default(Order::STATUS_OPEN);

            $table->foreign('ordered_by_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
