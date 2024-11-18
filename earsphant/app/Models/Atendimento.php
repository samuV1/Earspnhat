<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;

    protected $table = 'atendimentos'; // Nome da tabela
    protected $fillable = [
        'setor',
        'usuario',
        'codigo',
        'servico',
        'subservico',
        'status',
        'fila',
        'descricao',
        'abertura',
        'fechamento',
        'ans',
    ]; // Campos permitidos para preenchimento
}
