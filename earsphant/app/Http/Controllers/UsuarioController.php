<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //
    public function exibirAdicaoUsuario()
    {
        return view('administrador.adicionarUsuario');
    }
}
