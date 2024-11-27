<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class PesquisaController extends Controller
{
    public function exibirPesquisaAtendimento()
    {

    }
    public function exibirPesquisaUsuario(Request $request)
    {
        // Obtém os filtros da requisição
        $userId = $request->get('user_id');
        $userName = $request->get('user_name');

        // Constrói a query com base nos filtros fornecidos
        $query = Usuario::query();

        if ($userId) {
            $query->where('id', $userId); // Filtra pelo ID do usuário
        }

        if ($userName) {
            $query->where('nome', 'LIKE', "%{$userName}%"); // Filtra pelo nome do usuário (busca parcial)
        }

        // Executa a query e obtém os resultados
        $usuarios = $query->get();

        // Retorna a view com os resultados
        return view('administrador.pesquisaUsuario', [
            'users' => $usuarios, // Envia os resultados à view
        ]);
    }
}
