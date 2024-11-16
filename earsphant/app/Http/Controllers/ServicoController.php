<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicoController extends Controller
{
    //
    public function exibirAdicaoServico()
    {
        return view('administrador.adicionarServico');
    }
}
