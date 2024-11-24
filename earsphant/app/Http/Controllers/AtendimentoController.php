<?php

namespace App\Http\Controllers;
use App\Models\Atendimento;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    //
    public function exibirAbrirAtendimento()
    {
        return view('usuario.abrirAtendimento');
    }

    public function exibirHistorico()
    {
        return view('usuario.historico');
    }

    public function exibirAtendimentosAbertos()
    {
        return view('usuario.atendimentosAbertos');
    }

    public function exibirAtendimento()
    {
        return view('usuario.atendimento');
    }

    public function atendimento($codigo)
    {
        // Busca o primeiro atendimento com o código recebido
        $atendimento = Atendimento::where('codigo', $codigo)->firstOrFail();

        return view('usuario.atendimento', compact('atendimento'));
    }

}
