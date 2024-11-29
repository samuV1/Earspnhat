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

}
