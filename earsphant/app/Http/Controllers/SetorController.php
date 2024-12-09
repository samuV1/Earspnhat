<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setor;

class SetorController extends Controller
{
    // Exibir interface de adição de setor
    public function exibirAdicaoSetor()
    {
        return view('administrador.adicionarSetor');
    }

    // Exibir interface de ediçao de setor
    public function exibirEditarSetor(Setor $setor)
    {
        $setor = Setor::where('codigo', $setor->codigo)->firstOrFail();

        return view('administrador.editarSetor', compact('setor'));
    }

    // criar instância na tabela setor 
    public function armazenarBD(Request $request)
    {
        // Validar os dados
        $request->validate([
            'nome' => 'required|string|max:255',  // Nome do setor deve ser uma string e obrigatório
            'codigo' => 'required|integer|unique:setores,codigo', // Código do setor deve ser único e inteiro
        ]);

        // Criar o novo setor e armazená-lo no banco
        Setor::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
        ]);

        // Redirecionar de volta com uma mensagem de sucesso
        return redirect()->route('adicionarSetor')->with('success', 'Setor adicionado com sucesso!');
    }
}
