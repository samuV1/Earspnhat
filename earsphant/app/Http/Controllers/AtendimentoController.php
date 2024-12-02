<?php

namespace App\Http\Controllers;
use App\Models\Atendimento;
use App\Models\Anexo;
use App\Models\Servico;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    //
    public function exibirAbrirAtendimento()
    {
        return view('usuario.abrirAtendimento');
    }

    public function exibirAbrirAtendimentoADM()
    {
        // Obtém todas as categorias do banco de dados
        $categorias = Servico::all();

        // Retorna a view e passa as categorias para a view
    
        return view('administrador.abrirAtendimento', compact('categorias'));
    }

    public function exibirHistorico()
    {
        return view('usuario.historico');
    }

    public function exibirAtendimentosAbertos()
    {
        return view('usuario.atendimentosAbertos');
    }

    public function exibirAtendimento()
    {
        return view('usuario.atendimento');
    }

    public function atendimento($codigo)
    {
        // Busca o primeiro atendimento com o código recebido
        $atendimento = Atendimento::where('codigo', $codigo)->firstOrFail();

        // Consulta com JOIN para pegar as notas do atendimento e o autor da nota (usuário)
        $notas = DB::table('notas')
        ->join('usuarios', 'notas.usuario', '=', 'usuarios.login')  // Fazendo JOIN com a tabela 'usuarios'
        ->where('notas.atendimento', '=', $atendimento->codigo)  // Filtra pelo código de atendimento
        ->select('notas.*', 'usuarios.nome as autor')  // Seleciona as colunas necessárias
        ->orderBy('notas.created_at', 'desc')  // Ordena pela data de criação das notas (alterar para o campo de data adequado, se necessário)
        ->paginate(1);  // Paginação de 1 nota por página

        return view('usuario.atendimento', compact('atendimento', 'notas'));
    }

    public function atendimentoADM($codigo)
    {
        // Busca o primeiro atendimento com o código recebido
        $atendimento = Atendimento::where('codigo', $codigo)->firstOrFail();

        // Consulta com JOIN para pegar as notas do atendimento e o autor da nota (usuário)
        $notas =DB ::table('notas')
        ->join('usuarios', 'notas.usuario', '=', 'usuarios.login')  // Fazendo JOIN com a tabela users, onde 'login_usuario' é a chave estrangeira
        ->where('notas.atendimento', '=', $atendimento->codigo)  // Filtra pelo código de atendimento
        ->select('notas.*', 'usuarios.nome as autor')  // Seleciona as colunas necessárias
        ->paginate(1);  // Paginação de 5 notas por página

        return view('administrador.atendimento', compact('atendimento', 'notas'));
    }

    public function armazenarBD(Request $request)
    {
        // Validar os dados recebidos
        $request->validate([
            'telefone' => 'required', // Validação do campo 'descricao'
            'descricao' => 'required', // Validação do campo 'descricao'
            'servico' => 'required',   // Validação do campo 'servico'
        ], [
            'telefone.required' => 'O campo telefone é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'servico.required' => 'O campo serviço é obrigatório.',
        ]);

        // Criar o atendimento com o código gerado automaticamente
        $codigoAtendimento = Atendimento::gerarCodigoAtendimento();  // Gerar o código incremental

        $usuarioLogin = session('usuario_login');

        // Recupera o usuário no banco de dados com base no login
        $user = Usuario::where('login', $usuarioLogin)->first();

        if (!$user) {
            return redirect()->back()->with('erro', 'Usuário não encontrado.');
        }

        // Recupera o setor do usuário
        $setor = $user->setor;


        // Criar o atendimento
        $atendimento = Atendimento::create([
            'codigo' => $codigoAtendimento,  // Código gerado
            'descricao' => $request->descricao,  // Descrição do atendimento
            'setor' => $setor,
            'usuario' => $usuarioLogin,
            'servico' => $request->servico,
            'subservico' => null,
            'status' => 'Aberto',
            'fila' => 'Aberto',
            'abertura' => now(),
            'fechamento' => null,
            'ans' => null
        ]);

        // Verificar se o arquivo foi enviado
        if ($request->hasFile('arquivo')) {
            // Obter o arquivo
            $arquivo = $request->file('arquivo');

            // Nome único para o arquivo
            $nomeArquivo = time() . '.' . $arquivo->getClientOriginalExtension();

            // Salvar o arquivo localmente na pasta 'storage/app/uploads'
            $caminhoArquivo = $arquivo->storeAs('uploads', $nomeArquivo, 'local');  // Salva em storage/app/uploads

            // Salvar os dados no banco
            $anexo = Anexo::create([
                'atendimento' => $atendimento->codigo,  // Relaciona o anexo ao atendimento
                'url_arquivo' => $caminhoArquivo,  // Caminho do arquivo no armazenamento
            ]);
        }

        // Retornar uma resposta de sucesso
        return redirect()->back()->with('status', 'Solicitação aberta com sucesso!');
    }

    public function abrirAtendimentoADM(Request $request)
    {
        // Validar os dados recebidos
        $request->validate([
            'descricao' => 'required', // Validação do campo 'descricao'
            'servico' => 'required',   // Validação do campo 'servico'
        ]);

        // Criar o atendimento com o código gerado automaticamente
        $codigoAtendimento = Atendimento::gerarCodigoAtendimento();  // Gerar o código incremental

        $usuarioLogin = session('usuario_login');

        // Recupera o usuário no banco de dados com base no login
        $user = Usuario::where('login', $usuarioLogin)->first();

        if (!$user) {
            return redirect()->back()->with('erro', 'Usuário não encontrado.');
        }

        // Recupera o setor do usuário
        $setor = $user->setor;


        // Criar o atendimento
        $atendimento = Atendimento::create([
            'codigo' => $codigoAtendimento,  // Código gerado
            'descricao' => $request->descricao,  // Descrição do atendimento
            'setor' =>  $request->setor,
            'usuario' => $request->login,
            'servico' => $request->servico,
            'subservico' =>  $request->subservico,
            'status' => 'Aberto',
            'fila' => 'Aberto',
            'abertura' => now(),
            'fechamento' => null,
            'ans' => null,
            'encarregado' => $usuarioLogin,
        ]);

        // Verificar se o arquivo foi enviado
        if ($request->hasFile('arquivo')) {
            // Obter o arquivo
            $arquivo = $request->file('arquivo');

            // Nome único para o arquivo
            $nomeArquivo = time() . '.' . $arquivo->getClientOriginalExtension();

            // Salvar o arquivo localmente na pasta 'storage/app/uploads'
            $caminhoArquivo = $arquivo->storeAs('uploads', $nomeArquivo, 'local');  // Salva em storage/app/uploads

            // Salvar os dados no banco
            $anexo = Anexo::create([
                'atendimento' => $atendimento->codigo,  // Relaciona o anexo ao atendimento
                'url_arquivo' => $caminhoArquivo,  // Caminho do arquivo no armazenamento
            ]);
        }

        // Retornar uma resposta de sucesso
        return redirect()->back()->with('status', 'Solicitação aberta com sucesso!');
    }

}
