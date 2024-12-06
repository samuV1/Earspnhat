<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotaController extends Controller
{

    // criar instância na tabela notas no BD 
    public function adicaoNotaUsuario(Request $request, $codigoAtendimento)
    {
        // Validação da entrada (opcional)
        $request->validate([
            'descricao' => 'required|string|max:500',  // A descrição é obrigatória, do tipo string e com limite de 500 caracteres
        ]);

        $usuario = session('usuario_login');

        // Salvar a nova nota no banco de dados
        $nota = new Nota();
        $nota->atendimento = $codigoAtendimento;  // Associando ao atendimento correto
        $nota->descricao = $request->descricao;  // Descrição fornecida pelo usuário
        $nota->usuario = $usuario;  // O login do usuário autenticado
        $nota->data = now();
        $nota->save();

        // Redirecionar para a página de detalhes do atendimento (ou outro lugar)
        return redirect()->route('atendimento', $codigoAtendimento)
                        ->with('success', 'Nota adicionada com sucesso!');
    }
}
