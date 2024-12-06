<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programa;
use App\Models\Equipamento;
use App\Models\Setor;

class AtivoController extends Controller
{
    // Interface de adição de equipamento
    public function exibirAdicaoEquipamento()
    {
        return view('administrador.adicionarEquipamento');
    }

    // Interface de adição de Programa
    public function exibirAdicaoPrograma()
    {
        return view('administrador.adicionarPrograma');
    }

    // Criar instância na tabela equipamento
    public function armazenarEquipamentoBD(Request $request)
    {
        $request->validate([
            'patrimonio' => 'required',
            'tipo' => 'required',
            'aquisicao' => 'required',
            'alugado' => 'required',
            'marca' => 'nullable',
            'modelo' => 'nullable',
            'fornecedor' => 'nullable',
        ]);
    
        // Criar o equipamento
        Equipamento::create([
            'patrimonio' => $request->patrimonio,
            'tipo' => $request->tipo,
            'aquisicao' => $request->aquisicao,
            'alugado' => $request->alugado,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'fornecedor' => $request->fornecedor,
        ]);
    
        // Retornar uma resposta de sucesso
        return redirect()->back()->with('success', 'Equipamento adicionado com sucesso!');
    }

    // Criar instância na tabela Programa
    public function armazenarProgramaBD(Request $request)
    {
        $request->validate([
        'codigo' => 'required',
        'licenca' => 'nullable',
        'nome' => 'required',
        'fornecedor' => 'nullable',
        'versao' => 'nullable',
        'aquisicao' => 'nullable',
        'terceiros' => 'required',
        ]);
    
        // Criar o Programa
        Programa::create([
        'codigo' => $request->codigo,
        'licenca' => $request->licenca,
        'nome' => $request->nome,
        'fornecedor' => $request->fornecedor,
        'versao' => $request->versao,
        'aquisicao' => $request->aquisicao,
        'terceiros' =>$request->terceiros,
        ]);
    
        // Retornar uma resposta de sucesso
        return redirect()->back()->with('success', 'Programa adicionado com sucesso!');
    }

    public function editarEquipamento(Equipamento $equipamento)
    {
        $equipamentos = Equipamento::where('patrimonio', $equipamento->patrimonio)->firstOrFail();

        return view('administrador.editarEquipamento', compact('equipamentos'));
    }

    public function editarPrograma(Programa $programa)
    {
        $programas = Programa::where('codigo', $programa->codigo)->firstOrFail();

        return view('administrador.editarPrograma', compact('programas'));
    }
}
