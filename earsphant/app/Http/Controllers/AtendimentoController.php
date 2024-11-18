<?php

namespace App\Http\Controllers;
use App\Models\Atendimento;

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

    public function listarAtendimentosHistorico()
    {

        // Busca os tickets com status "Finalizado" do usuário autenticado
        $tickets = Atendimento::where('status', 'Finalizado')
        ->where('usuario', 'login') // Ajuste conforme o valor necessário
        ->get();
        // Retorna a view com os dados
        return view('atendimentos.index', compact('tickets'));
    }
}
