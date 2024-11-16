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
        // tabela de atendimentos, coluna 'codigo' é uma chave candidata
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('setor')->nullable();
            $table->string('usuario');
            $table->unsignedBigInteger('codigo')->unique();
            $table->string('servico', 20);
            $table->string('subservico', 20)->nullable();
            $table->string('status', 20);
            $table->string('fila', 20);
            $table->string('descricao', 20);
            $table->dateTime('abertura');
            $table->dateTime('fechamento');
            $table->dateTime('ans')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
