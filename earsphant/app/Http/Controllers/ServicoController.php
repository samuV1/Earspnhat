<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;


class ServicoController extends Controller
{
    //
    public function exibirAdicaoServico()
    {
        return view('administrador.adicionarServico');
    }

    public function opcoesSelect()
    {
        // Obtém todas as categorias do banco de dados
        $categorias = Servico::all();

        // Retorna a view e passa as categorias para a view
        return view('usuario.abrirAtendimento', compact('categorias'));
    }

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
