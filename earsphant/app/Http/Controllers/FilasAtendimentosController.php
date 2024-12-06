<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\Usuario;

class FilasAtendimentosController extends Controller
{
    // Exibir a fila de solicitações abertas no módulo administrador
    public function filaAbertos()
    {
        // Busca todos os atendimentos com status "Aberto"
        $atendimentos = Atendimento::where('status', 'Aberto')->get();

        return view('administrador.filaAtendimentoAberto', compact('atendimentos'));
    }

    // exibir a fila do nível do agente (técncio, analista ou administrador)
    public function filaSetor()
    {
        $usuarioLogin = session('usuario_login');


        // Recupera o usuário no banco de dados com base no login
        $user = Usuario::where('login', $usuarioLogin)->first();

        if (!$user) {
            return redirect()->back()->with('erro', 'Usuário não encontrado.');
        }

        // Recupera o setor do usuário
        $setor = $user->setor;

        // Busca todos os atendimentos com status "Aberto"
        $atendimentos = Atendimento::where('fila', $setor)->get();

        return view('administrador.filaSetor', compact('atendimentos'));
    }

    // Exibir a fila de solicitações em que o agente atual é o encarregado
    public function minhaFila()
    {

        $usuarioLogin = session('login');

        // Busca todos os atendimentos com status "Aberto"
        $atendimentos = Atendimento::where('encarregado', $usuarioLogin)->get();

        return view('administrador.minhaFila', compact('atendimentos'));
    }

    
}
