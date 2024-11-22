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

    public function historicoFinalizados($userId = null)
    {
        // Usa o valor da sessão caso o parâmetro não seja passado
        $userId = $userId ?? session('user_id') ?? Auth::id();
        
        $atendimentos = Atendimento::where('cliente_id', $userId)
                                   ->where('status', 'finalizado')
                                   ->get();
        
        return view('atendimentos.historico', compact('atendimentos'));
        
    }
}
