<?php

use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\AtivoController;
use App\Http\Controllers\AutenticadorController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/', [AutenticadorController::class, 'exibirIndex'])->name('index');
/*Route::post('/', 'AutenticadorController@')->name('index');*/

// Fallback
Route::fallback(function(){
    echo "A página que você que você digitou não existe!";
}); 

// modulo usuario

//Inicio
Route::get('/usuario/inicio', [AutenticadorController::class, 'exibirInicioUsuario'])->name('inicioUsuario');

//AbrirAtendimento
Route::get('/usuario/abrirAtendimento', [AtendimentoController::class, 'exibirAbrirAtendimento'])->name('abrirAtendimento');

//HistoricoAtendimento
Route::get('/usuario/historico', [AtendimentoController::class, 'exibirHistorico'])->name('historico');
 
//AtendimentosAbertos
Route::get('/usuario/atendimentosAbertos', [AtendimentoController::class, 'exibirAtendimentosAbertos'])->name('atendimentosAbertos');

//AtendimentosAbertos
Route::get('/usuario/atendimentos', [AtendimentoController::class, 'exibirAtendimento'])->name('atendimento');

// admin

Route::get('/administrador/inicio', [AutenticadorController::class, 'exibirInicioAdm'])->name('inicioAdm');

/*Interface Adicionar Usuário*/ 
Route::get('/administrador/adicionarUsuario', [UsuarioController::class, 'exibirAdicaoUsuario'])->name('adicionarUsuario');

Route::post('/admin_interfaces/add_user', 'UserController@add_user_db')->name('add_user');
/*Interface Adicionar Usuário*/ 

/*Interface Adicionar Active*/ 
Route::get('/administrador/adicionarAtivo', [AtivoController::class, 'exibirAdicaoAtivo'])->name('adicionarAtivo');
Route::post('/admin_interfaces/add_active', 'ActiveController@add_active_db')->name('add_active');
/*Interface Adicionar Active*/ 

/*Interface Adicionar Setor*/ 
Route::get('/administrador/adicionarSetor', [SetorController::class, 'exibirAdicaoSetor'])->name('adicionarSetor');
Route::post('/admin_interfaces/add_sector', 'SectorController@add_sector_db')->name('add_sector');
/*Interface Adicionar Setor*/ 

/*Interface Adicionar Serviço*/ 
Route::get('/administrador/adicionarServico', [ServicoController::class, 'exibirAdicaoServico'])->name('adicionarServico');
Route::post('/admin_interfaces/add_service', 'ServiceController@add_service_db')->name('add_service');
/*Interface Adicionar Serviço*/ 

/*Interface Editar Usuário*/ 
Route::get('/admin_interfaces/edit_user/{id?}/{user?}', 'UserController@get_view_edit')->name('edit_user');
Route::post('/admin_interfaces/edit_user', 'UserController@edit_user_db')->name('edit_user');
/*Interface Editar Usuário*/ 

/*Interface Editar Active*/ 
Route::get('/admin_interfaces/edit_active', 'ActiveController@get_view_edit')->name('edit_active');
Route::post('/admin_interfaces/edit_active', 'ActiveController@edit_active_db')->name('edit_active');
/*Interface Editar Active*/ 

/*Interface Editar Setor*/ 
Route::get('/admin_interfaces/edit_sector', 'SectorController@get_view_edit')->name('edit_sector');
Route::post('/admin_interfaces/edit_sector', 'SectorController@edit_sector_db')->name('edit_sector');
/*Interface Editar Setor*/ 

Route::get('/admin_interfaces/search_user', 'SearchController@get_view_search_user')->name('search_user');
Route::get('/admin_interfaces/search_ticket', 'SearchController@get_view_search_ticket')->name('search_ticket');
Route::get('/admin_interfaces/search_active', 'SearchController@get_view_search_active')->name('search_active');

Route::post('/admin_interfaces/search_user', 'SearchController@search_user')->name('search_user');

Route::get('/admin/open_ticket','TicketController@open_ticket_admin')->name('open_ticket_admin');