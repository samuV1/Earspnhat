<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;


class FilasAtendimentosController extends Controller
{
    //
    public function filaAbertos()
    {
        // Busca todos os atendimentos com status "Aberto"
        $atendimentos = Atendimento::where('status', 'Aberto')
                                   ->get();

        return view('administrador.filaAtendimentoAberto', compact('atendimentos'));
    }
}
