<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Equipamento;
use App\Models\Programa;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Servico;


class PesquisaController extends Controller
{
    public function exibirPesquisaAtendimento(Request $request)
    {
        $atendimentos = Atendimento::where('codigo', 'like', '%'.$request->input('codigo').'%')
                    ->where('setor', 'like', '%'.$request->input('setor').'%')
                    ->where('status', 'like', '%'.$request->input('status').'%')
                    ->where('usuario', 'like', '%'.$request->input('usuario').'%')
                    ->where('servico', 'like', '%'.$request->input('servico').'%')
                    ->get();

        // Obtém todas as categorias do banco de dados
        $categorias = Servico::all();

        // Retorna a view e passa as categorias para a view
        return view('administrador.pesquisaAtendimento', compact('categorias'), ['atendimentos' => $atendimentos]);
    
    }

    public function exibirPesquisaAtivo()
    {
        return view('administrador.pesquisaAtivo');
    }
    public function exibirPesquisaUsuario(Request $request)
    {
        $usuarios = Usuario::where('nome', 'like', '%'.$request->input('nome').'%')
                        ->where('setor', 'like', '%'.$request->input('setor').'%')
                        ->where('acesso', 'like', '%'.$request->input('acesso').'%')
                        ->where('login', 'like', '%'.$request->input('login').'%')
                        ->get();

        return view('administrador.pesquisaUsuario', ['usuarios' => $usuarios]);
    }

    public function pesquisaUsuario(Request $request)
    {
        $usuarios = Usuario::where('nome', 'like', '%'.$request->input('nome').'%')
                            ->where('setor', 'like', '%'.$request->input('setor').'%')
                            ->where('acesso', 'like', '%'.$request->input('acesso').'%')
                            ->where('login', 'like', '%'.$request->input('login').'%')
                            ->get();

        return view('administrador.pesquisaUsuario', ['usuarios' => $usuarios]);
    }

    public function pesquisaAtendimento(Request $request)
    {
        $atendimentos = Atendimento::where('codigo', 'like', '%'.$request->input('codigo').'%')
                    ->where('setor', 'like', '%'.$request->input('setor').'%')
                    ->where('status', 'like', '%'.$request->input('status').'%')
                    ->where('usuario', 'like', '%'.$request->input('usuario').'%')
                    ->where('servico', 'like', '%'.$request->input('servico').'%')
                    ->get();

        $categorias = Servico::all();

        return view('administrador.pesquisaAtendimento', compact('categorias'), ['atendimentos' => $atendimentos]);
    }

    public function pesquisaEquipamento(Request $request)
    {
        $equipamentos = Equipamento::where('patrimonio', 'like', '%'.$request->input('patrimonio').'%')
                    ->where('tipo', 'like', '%'.$request->input('tipo').'%')
                    ->where('aquisicao', 'like', '%'.$request->input('aquisicao').'%')
                    ->where('alugado', 'like', '%'.$request->input('alugado').'%')
                    ->where('marca', 'like', '%'.$request->input('marca').'%')
                    ->where('modelo', 'like', '%'.$request->input('modelo').'%')
                    ->get();
        
        return view('administrador.pesquisaEquipamento', ['equipamentos' => $equipamentos]);
    }

    public function pesquisaPrograma(Request $request)
    {
        $programas = Programa::where('licenca', 'like', '%'.$request->input('licenca').'%')
                    ->where('codigo', 'like', '%'.$request->input('codigo').'%')
                    ->where('aquisicao', 'like', '%'.$request->input('aquisicao').'%')
                    ->where('terceiros', 'like', '%'.$request->input('terceiros').'%')
                    ->where('nome', 'like', '%'.$request->input('nome').'%')
                    ->where('fornecedor', 'like', '%'.$request->input('fornecedor').'%')
                    ->get();
        
        return view('administrador.pesquisaPrograma', ['programas' => $programas]);
    }
}
