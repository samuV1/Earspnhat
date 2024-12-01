@extends('base')

@section('titles', 'Pesquisar usuário')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_modulo/historico.css') }}>
@endsection


@section('pages')

    @include('administrador.cabecalho')
    
    <main class="element_flex_dad">

        <h2>Pesquisar Usuário</h2>

        <form id="form_user" action="{{ route('adicionarUsuario') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <section id="format_form_user">

                <div id="div_details_user">
                    
                    <section class="format_form_sections">
                        <label for="input_add_user_name">Nome:</label>
                        <input class="input_text" id="input_add_user_name" name="nome" type="text">

                        <label for="input_add_user_sector">Setor:</label>
                        <input class="input_text" id="input_add_user_sector" name="setor" type="text">

                        <label for="dropdown_level_access">Acesso:</label>
                        <select class="input_droplist" id="dropdown_level_access" name="acesso">
                        <option value="0">Usuário</option>
                        <option value="1">Técnico (nível 1)</option>
                        <option value="2">Analista (nível 2)</option>
                        <option value="3">Administrador</option>
                        </select>

                        <label for="input_add_user_login">Usuário:</label>
                        <input class="input_text" id="input_add_user_login" name="login" type="text">              
                    </section>
                </div>
            </section>

            <section id="button_group">
                <input class="add_button" type="submit" value="Pesquisar">
                <input class="cancel_button" type="reset" value="Limpar">
            </section>

            <section>
                @foreach ($usuarios as $usuario)
                    <li class="historico">
                        <strong class="historico">Nome:</strong> {{ $usuario->nome }} 
                        <strong class="historico">| Setor:</strong> {{ $usuario->setor }} 
                        <strong class="historico">| Login:</strong> {{ $usuario->login }} 
                        <a class="historico" href="{{ route('pesquisaUsuario') }}">Ver detalhes</a>
                    </li>
                @endforeach
            </section>
        </form>

    </main>

    @include('administrador.rodape')

@endsection