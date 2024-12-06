<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;


class ServicoController extends Controller
{
    // exibir interface de adição de serviço
    public function exibirAdicaoServico()
    {
        return view('administrador.adicionarServico');
    }

    // criar instância na tabela serviços
    public function armazenarBD(Request $request)
    {
        // Validar os dados
        $request->validate([
            'servico' => 'required|string|max:255',  // Nome do setor deve ser uma string e obrigatório
        ]);

        $status = "ativos";

        // Criar o novo setor e armazená-lo no banco
        Servico::create([
            'servico' => $request->servico,
            'ans' => $request->ans,
            'status' => $status,
        ]);

        // Redirecionar de volta com uma mensagem de sucesso
        return redirect()->route('adicionarServico')->with('success', 'Servico adicionado com sucesso!');
    }

}
