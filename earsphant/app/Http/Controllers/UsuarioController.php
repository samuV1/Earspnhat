<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // exibir a interface de adição de usuário
    public function exibirAdicaoUsuario()
    {
        return view('administrador.adicionarUsuario');
    }

    // criar instância na tabela usuário
    public function armazenarBD(Request $request)
    {
    // Validação dos dados
    $request->validate([
        'nome' => 'required|string|max:255',
        'setor' => 'required|integer|max:255',
        'acesso' => 'required|integer|min:0|max:3',
        'login' => 'required|string|max:255|unique:usuarios,login',
        'senha' => 'required|string',
        'url_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto opcional
    ]);

    // Variável para armazenar o caminho do arquivo
    $caminhoImagem = null;

    // Verificar se o arquivo foi enviado
    if ($request->hasFile('url_foto') && $request->file('url_foto')->isValid()) {
        // Obter o arquivo
        $arquivo = $request->file('url_foto');

        // Criar um nome único para o arquivo
        $nomeArquivo = time() . '.' . $arquivo->getClientOriginalExtension();

        // Salvar o arquivo localmente na pasta 'storage/app/uploads'
        $caminhoImagem = $arquivo->storeAs('uploads/usuarios', $nomeArquivo, 'local'); // Pasta 'storage/app/uploads/usuarios'
    }

    // Criar o usuário no banco de dados
    Usuario::create([
        'nome' => $request->nome,
        'setor' => $request->setor,
        'acesso' => $request->acesso,
        'login' => $request->login,
        'senha' => $request->senha, // Salvar senha criptografada
        'url_foto' => $caminhoImagem, // Caminho do arquivo no servidor
    ]);

    // Retornar resposta de sucesso
    return redirect()->back()->with('success', 'Usuário adicionado com sucesso!');
    }

    public function editarUsuario()
    {
        return view('administrador.editarUsuario');
    }
}
