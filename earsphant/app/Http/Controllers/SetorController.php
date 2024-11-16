<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    //
    public function exibirAdicaoSetor()
    {
        return view('administrador.adicionarSetor');
    }
}
