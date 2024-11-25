<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;

    protected $table = 'anexos'; // Nome da tabela
    protected $fillable = [
        'atendimento',
        'url_arquivo',
    ]; // Campos permitidos para preenchimento
}
