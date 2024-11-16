<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AtivoController extends Controller
{
    //
    public function exibirAdicaoAtivo()
    {
        return view('administrador.adicionarAtivo');
    }
}
