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
        // tabela para inventário de programas, coluna 'codigo' é uma chave candidata, para númeração interna
        Schema::create('programas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('codigo')->unique();
            $table->string('licenca')->nullable();
            $table->string('nome', 20);
            $table->string('fornecedor', 20)->nullable();
            $table->string('versao', 20)->nullable();
            $table->date('aquisicao', 20)->nullable();
            $table->boolean('terceiros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas');
    }
};
