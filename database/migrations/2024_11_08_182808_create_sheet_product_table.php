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
        Schema::disableForeignKeyConstraints();

        Schema::create('sheet_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sheet_id');
            $table->foreign('sheet_id')->references('id')->on('sheets');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sheet_product');
    }
};
