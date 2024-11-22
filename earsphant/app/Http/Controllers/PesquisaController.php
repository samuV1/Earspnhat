<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    //
    public function exibirPesquisaUsuario()
    {
        return view('administrador.pesquisaUsuario');
    }

    public function exibirPesquisaAtendimento()
    {
        return view('administrador.pesquisaAtendimento');
    }

    public function exibirPesquisaAtivo()
    {
        return view('administrador.pesquisaAtivo');
    }
}
