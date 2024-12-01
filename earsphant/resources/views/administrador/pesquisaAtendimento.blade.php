@extends('base')

@section('titles', 'Pesquisar ticket')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/historico.css') }}>
@endsection


@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">

        <h2>Pesquisar Atendimentos</h2>

        <form id="form_user" action="{{ route('pesquisaAtendimento') }}" method="POST" >
            @csrf
            <section id="format_form_user">

                <div id="div_details_user">
                    
                    <section class="format_form_sections">
                        <label for="input_add_user_name">Código:</label>
                        <input class="input_text" id="input_add_user_name" name="codigo" type="text">

                        <label for="input_add_user_sector">Setor:</label>
                        <input class="input_text" id="input_add_user_sector" name="setor" type="text">

                        <label for="input_add_user_sector">Login do Usuário:</label>
                        <input class="input_text" id="input_add_user_sector" name="usuario" type="text">

                        <label for="dropdown_level_access">Status:</label>
                        <select class="input_droplist" id="dropdown_level_access" name="status">
                        <option value="">Todos</option>
                        <option value="aberto">Aberto</option>
                        <option value="finalizado">Finalizado (nível 1)</option>
                        <option value="2">Analista (nível 2)</option>
                        <option value="3">Administrador</option>
                        </select>  

                        <label for="">Serviço</label>
                        <select name="servico" id="">
                            <option value="">Todos</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->servico }}" {{ old('servico') == $categoria->servico ? 'selected' : '' }}>
                                    {{ $categoria->servico }}
                                </option>
                            @endforeach
                        </select>
 
                    </section>
                </div>
            </section>

            <section id="button_group">
                <input class="add_button" type="submit" value="Pesquisar">
                <input class="cancel_button" type="reset" value="Limpar">
            </section>
        </form>
            <section>
                @foreach ($atendimentos as $atendimento)
                    <li class="historico">
                        <strong class="historico">Nome:</strong> {{ $atendimento->nome }} 
                        <strong class="historico">| Setor:</strong> {{ $atendimento->setor }} 
                        <strong class="historico">| Usuario:</strong> {{ $atendimento->usuario }} 
                        <a class="historico" href="{{ route('pesquisaAtendimento') }}">Ver detalhes</a>
                    </li>
                @endforeach
            </section>

    </main>

    @include('administrador.rodape')

@endsection