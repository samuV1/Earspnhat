<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    // Autenticador de usuário
    public function login(Request $request)
    {
        // Validação simples
        $credenciais = $request->validate([
            'login' => 'required|string',
            'senha' => 'required|string',
        ]);

        // Busca o usuário pelo login
        $usuario = Usuario::where('login', $credenciais['login'])->first();

        // Verifica se o usuário existe e a senha está correta
        if ($usuario && ($credenciais['senha'] == $usuario->senha) && ($usuario->acesso == 1)) {
            $request->session()->put('usuario_login', $usuario->login); // Salva o ID do usuário na sessão
            session(['login' => $usuario->login]);

            return redirect('/usuario/inicio');
        }
        if ($usuario && ($credenciais['senha'] == $usuario->senha) && ($usuario->acesso == 2)) {
            $request->session()->put('usuario_login', $usuario->login); // Salva o ID do usuário na sessão
            return redirect('/administrador/inicio');
        }
        if ($usuario && ($credenciais['senha'] == $usuario->senha) && ($usuario->acesso == 3)) {
            $request->session()->put('usuario_login', $usuario->login); // Salva o ID do usuário na sessão
            return redirect('/administrador/inicio');
        }

        return back()->withErrors(['login' => 'Login ou senha inválidos']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('usuario_login');
        return redirect('/');
    }
}
