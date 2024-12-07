@extends('base')

@section('titles', 'Pesquisar ativo')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/pesquisa.css') }}>
@endsection


@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
        <h1>Pesquisar Programa</h1>

        
        <form id="form_active" action="{{ route('pesquisaProgramas') }}" method="POST">
            @csrf

            <section class="inputPesquisa">              
            <label for="input_add_active_license">Licença:</label>
            <input class="input_text" id="input_add_active_license" name="licenca" type="text">
    
            <label for="input_add_active_code">Numeração Interna:</label>
            <input class="input_text" id="input_add_active_code" name="codigo" type="text">
                    
            <label for="input_add_active_aquisition">Data de aquisição:</label>
            <input class="input_date" id="input_add_active_aquisition" name="aquisicao" type="date">
            </section>    

            <section class="inputPesquisa">
            <label for="dropdown_soft_or_hard">Desenvolvido por terceiros?</label>
            <select class="input_droplist" id="dropdown_soft_or_hard" name="terceiros">
                <option value="">Selecione</option>
                <option value="false">Não</option>
                <option value="true">Sim</option>
            </select>
    
            <label for="input_add_active_model">Nome:</label>
            <input class="input_text" id="input_add_active_model" name="nome"  type="text">
    
            <label for="input_add_active_brand">Fornecedor:</label>
            <input class="input_text" id="input_add_active_brand" name="fornecedor" type="text">
            </section>           

            <section class="grupoBotao">
                <input class="pesquisar_button" type="submit" value="Pesquisar">
                <input class="limpar_button" type="reset" value="Limpar">
            </section>

        </form>

        <section>
            <div class="areaTicket">
                @foreach ($programas as $programa)
                    <li class="historico">
                        <strong class="historico">Nome:</strong> {{ $programa->nome }} 
                        <strong class="historico">| Código:</strong> {{ $programa->codigo }} 
                        <strong class="historico">| Tipo:</strong> {{ $programa->tipo }} 
                        <a class="historico" href="{{ route('editarPrograma',[ $programa ]) }}">Ver detalhes</a>
                    </li>
                @endforeach
            </div>
        </section>
    </main>

    @include('administrador.rodape')

@endsection