@extends('base')

@section('titles', 'Pesquisar usuário')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/pesquisa.css') }}>
@endsection


@section('pages')

    @include('administrador.cabecalho')
    
    <main class="elemento_pai">

        <h1>Pesquisar Usuário</h1>

        <form id="form_user" action="{{ route('pesquisaUsuario') }}" method="POST" >
            @csrf
            <section id="format_form_user">

                <div id="div_details_user">
                    
                    <section class="format_form_sections">
                        <label for="input_add_user_name">Nome:</label>
                        <input class="entrada_texto" id="input_add_user_name" name="nome" type="text">

                        <label for="input_add_user_sector">Setor:</label>
                        <input class="entrada_texto" id="input_add_user_sector" name="setor" type="text">

                        <label for="dropdown_level_access">Acesso:</label>
                        <select class="input_droplist" id="dropdown_level_access" name="acesso">
                        <option value="">Todos</option>
                        <option value="0">Usuário</option>
                        <option value="1">Técnico (nível 1)</option>
                        <option value="2">Analista (nível 2)</option>
                        <option value="3">Administrador</option>
                        </select>

                        <label for="input_add_user_login">Usuário:</label>
                        <input class="entrada_texto" id="input_add_user_login" name="login" type="text">              
                    </section>
                </div>
            </section>

            <section class="grupoBotao">
                <input class="pesquisar_button" type="submit" value="Pesquisar">
                <input class="limpar_button" type="reset" value="Limpar">
            </section>
        </form>
            <section>
                <div class="areaTicket">
                    @foreach ($usuarios as $usuario)
                        <li class="historico">
                            <strong class="historico">Nome:</strong> {{ $usuario->nome }} 
                            <strong class="historico">| Setor:</strong> {{ $usuario->setor }} 
                            <strong class="historico">| Login:</strong> {{ $usuario->login }} 
                            <a class="historico" href="{{ route('editarUsuario') }}">Ver detalhes</a>
                        </li>
                    @endforeach
                </div>
            </section>

  


    </main>

    @include('administrador.rodape')

@endsection