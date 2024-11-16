<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutenticadorController extends Controller
{
    public function exibirIndex()
    {
        return view('index');
    }

    public function exibirInicioUsuario()
    {
        return view('usuario.inicio');
    }

    public function exibirInicioAdm()
    {
        return view('administrador.inicio');
    }
}
