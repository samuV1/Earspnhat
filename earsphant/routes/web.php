<?php

use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\AtivoController;
use App\Http\Controllers\AutenticadorController;
use App\Http\Controllers\EstatisticasController;
use App\Http\Controllers\FilasAtendimentosController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PesquisaController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\NotaController;
use App\Models\Atendimento;
use App\Models\Nota;
use Illuminate\Support\Facades\Route;

// Login e logout
Route::get('/', [AutenticadorController::class, 'exibirIndex'])->name('index');
Route::post('/', [AutenticadorController::class, 'login'])->name('login');
Route::get('/logout', [AutenticadorController::class, 'logout'])->name('logout');

// Fallback
Route::fallback(function(){
    echo "A página que você que você digitou não existe!";
}); 

// modulo usuario

//Inicio
Route::get('/usuario/inicio', [AutenticadorController::class, 'exibirInicioUsuario'])->name('inicioUsuario');

//AbrirAtendimento
Route::get('/usuario/abrirAtendimentos', [AtendimentoController::class, 'exibirAbrirAtendimento'])->name('abrirAtendimentos');
Route::get('/usuario/abrirAtendimento', [ServicoController::class, 'opcoesSelect'])->name('abrirAtendimento');

//HistoricoAtendimento

Route::get('/usuario/historico', [HistoricoController::class, 'historico'])->name('tickets.historico');
Route::get('/historico/{codigo}', [HistoricoController::class, 'detalhes'])->name('tickets.detalhes');

Route::get('/historico/historico/{userId?}', [AtendimentoController::class, 'historicoFinalizados'])->name('atendimentos.finalizados');

//AtendimentosAbertos
Route::get('/usuario/atendimentosAbertos', [AtendimentoController::class, 'exibirAtendimentosAbertos'])->name('atendimentosAbertos');

//AtendimentosAbertos
Route::get('/usuario/atendimentos', [AtendimentoController::class, 'exibirAtendimento'])->name('atendimento');
Route::get('/usuario/atendimentosAbertos', [HistoricoController::class, 'historicoAbertos'])->name('atendimentoHistoricoAberto');

//Atendimentos
Route::get('/usuario/atendimento/{codigo}', [AtendimentoController::class, 'atendimento'])->name('atendimento');

Route::post('usuario/atendimentos', [AtendimentoController::class, 'armazenarBD'])->name('armazenar');

// Admin
Route::get('/administrador/inicio', [AutenticadorController::class, 'exibirInicioAdm'])->name('inicioAdm');

// Interface Adicionar Usuário
Route::get('/administrador/adicionarUsuario', [UsuarioController::class, 'exibirAdicaoUsuario'])->name('adicionarUsuario');
Route::post('/administrador/adicionarUsuario', [UsuarioController::class, 'adicionarUsuario'])->name('adicionarUsuario');

// Interface Adicionar Ativo
Route::get('/administrador/adicionarAtivo', [AtivoController::class, 'exibirAdicaoAtivo'])->name('adicionarAtivo');
Route::post('/administrador/adicionarAtivo', [AtivoController::class, 'adicionarAtivo'])->name('adicionarAtivo');

// Interface Adicionar Setor
Route::get('/administrador/adicionarSetor', [SetorController::class, 'exibirAdicaoSetor'])->name('adicionarSetor');
Route::post('/admin_interfaces/add_sector', [SetorController::class, 'add_sector_db'])->name('add_sector');

// Interface Adicionar Serviço
Route::get('/administrador/adicionarServico', [ServicoController::class, 'exibirAdicaoServico'])->name('adicionarServico');
Route::post('/administrador/adicionarServico', [ServicoController::class, 'adicionarServico'])->name('adicionarServico');

// Interface Editar Usuário
Route::get('/admin_interfaces/edit_user/{id?}/{user?}', [UsuarioController::class, 'get_view_edit'])->name('edit_user');
Route::post('/admin_interfaces/edit_user', [UsuarioController::class, 'edit_user_db'])->name('edit_user');

// Interface Editar Ativo
Route::get('/admin_interfaces/edit_active', [AtivoController::class, 'get_view_edit'])->name('edit_active');
Route::post('/admin_interfaces/edit_active', [AtivoController::class, 'edit_active_db'])->name('edit_active');

// Interface Editar Setor
Route::get('/admin_interfaces/edit_sector', [SetorController::class, 'get_view_edit'])->name('edit_sector');
Route::post('/admin_interfaces/edit_sector', [SetorController::class, 'edit_sector_db'])->name('edit_sector');

// Pesquisas
Route::get('/administrador/pesquisaUsuario', [PesquisaController::class, 'exibirPesquisaUsuario'])->name('pesquisaUsuario');
Route::get('/administrador/pesquisaAtendimento', [PesquisaController::class, 'exibirPesquisaAtendimento'])->name('pesquisaAtendimento');
Route::get('/administrador/pesquisaAtivo', [PesquisaController::class, 'exibirPesquisaAtivo'])->name('pesquisaAtivo');

Route::post('/admin_interfaces/search_user', [PesquisaController::class, 'search_user'])->name('search_user');

// Abertura de Tickets
Route::get('/admin/open_ticket', [AtendimentoController::class, 'open_ticket_admin'])->name('open_ticket_admin');

// Estatísticas

Route::get('/administrador/estatisticas', [EstatisticasController::class, 'exibirEstatisticas'])->name('estatisticas');

// Fila de atendimentos

Route::get('/administrador/filaAtendimentoAberto', [FilasAtendimentosController::class, 'filaAbertos'])->name('filaAtendimentoAbertos');

//// testes
Route::post('/atendimento/{codigo}/nota', [NotaController::class, 'adicaoNotaUsuario'])->name('adicaoNotaUsuario');

/// ideias

Route::get('/administrador/editarUsuario/{id}', [UsuarioController::class, 'editar'])->name('edit_user');
Route::delete('/administrador/excluirUsuario/{id}', [UsuarioController::class, 'excluir'])->name('delete_user');

/// ideias

Route::get('/administrador/editarUsuario/{id}', [UsuarioController::class, 'editar'])->name('edit_user');
Route::delete('/administrador/excluirUsuario/{id}', [UsuarioController::class, 'excluir'])->name('delete_user');



