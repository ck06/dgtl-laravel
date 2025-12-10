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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        // due to time constraints, add some brands in the database for the product pages.
        // (note: would normally be in a Seeder instead)
        DB::table('brands')->insert([
            ['name' => 'Huismerk'],
            ['name' => 'A-merk'],
            ['name' => 'B-merk'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand');
    }
};
