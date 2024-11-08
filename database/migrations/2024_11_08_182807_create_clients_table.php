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

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('cpf_cnpj');
            $table->string('phone');
            $table->string('city')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('cep')->nullable();
            $table->string('street')->nullable();
            $table->string('address_number')->nullable();
            $table->boolean('status')->default(true);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
