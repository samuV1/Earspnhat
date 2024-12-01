@extends('base')

@section('titles', 'Pesquisar ativo')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/pesquisa.css') }}>
@endsection


@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
        <h1>Pesquisar Equipamento</h1>

        <form id="form_active" action="{{ route('pesquisaEquipamento') }}" method="POST">
            @csrf
        <section class="inputPesquisa">
            <label for="input_add_active_license">Código/Patrimônio:</label>
            <input class="input_text" id="input_add_active_license" name="patrimonio" type="text" required>
        
            <label for="input_add_active_code">Tipo</label>
            <input class="input_text" id="input_add_active_code" name="tipo" type="text" required>

            <label for="input_add_active_aquisition">Data de aquisição:</label>
            <input class="input_date" id="input_add_active_aquisition" name="aquisicao" type="date" required>
        </section>
        <section class="inputPesquisa">
            <label for="dropdown_soft_or_hard">Equipamento alugado?</label>
            <select class="input_droplist" id="dropdown_soft_or_hard" name="alugado" required>
                <option value="false">Não</option>
                    <option value="true">Sim</option>
            </select>
 
            <label for="input_add_active_model">Marca:</label>
            <input class="input_text" id="input_add_active_model" name="marca" type="text">
        
            <label for="input_add_active_type">Modelo:</label>
            <input class="input_text" id="input_add_active_type" name="modelo" type="text">
           </section>
            <section class="grupoBotao">
                <input class="pesquisar_button" type="submit" value="Adicionar">
                <input class="limpar_button" type="reset" value="Desistir">
            </section>
        </form>

        <section>
            @foreach ($equipamentos as $equipamento)
                <li class="historico">
                    <strong class="historico">Nome:</strong> {{ $equipamento->nome }} 
                    <strong class="historico">| Setor:</strong> {{ $equipamento->setor }} 
                    <strong class="historico">| Login:</strong> {{ $equipamento->login }} 
                    <a class="historico" href="{{ route('pesquisaEquipamento') }}">Ver detalhes</a>
                </li>
            @endforeach
        </section>
        
    </main>

    @include('administrador.rodape')

@endsection