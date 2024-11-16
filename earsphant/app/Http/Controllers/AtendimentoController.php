<?php

namespace App\Http\Controllers;

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
}
