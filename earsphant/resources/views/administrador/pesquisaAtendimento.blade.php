@extends('base')

@section('titles', 'Pesquisar ticket')

@section('estilo_pagina_css')
    <link rel="stylesheet" href={{ asset('css/modulo_administrador/pesquisa.css') }}>
@endsection


@section('pagina')

@include('administrador.cabecalho')
    
    <main class="elemento_pai">

        <h1>Pesquisar Atendimentos</h1>

        <form id="formulario_pesquisar_atendimentos" action="{{ route('pesquisaAtendimento') }}" method="POST" >
            @csrf
            <section id="formatacao_formulario_pesquisar_atendimentos">

                <div id="div_detalhes">
                    
                    <section class="formatacao_seções_formulario">
                        <label for="codigo">Código:</label>
                        <input class="entrada_texto" id="codigo" name="codigo" type="text" value="{{request('codigo')}}">

                        <label for="setor">Setor:</label>
                        <input class="entrada_texto" id="setor" name="setor" type="text" value="{{request('setor')}}">

                        <label for="usuario">Login do Usuário:</label>
                        <input class="entrada_texto" id="usuario" name="usuario" type="text" value="{{request('usuario')}}">

                        <label for="status">Status:</label>
                        <select class="estrada_lista_suspensa" id="status" name="status">
                            <option value="" {{ request('status') == '' ? 'selected' : '' }}>Todos</option>
                            <option value="aberto" {{ request('status') == 'aberto' ? 'selected' : '' }}>Aberto</option>
                            <option value="finalizado" {{ request('status') == 'finalizado' ? 'selected' : '' }}>Finalizado (nível 1)</option>
                            <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Analista (nível 2)</option>
                            <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Administrador</option>
                        </select>

                        <label for="servico">Serviço:</label>
                        <select name="servico" id="servico">
                            <option value="" {{ request('servico') == '' ? 'selected' : '' }}>Todos</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->servico }}" 
                                    {{ request('servico') == $categoria->servico ? 'selected' : '' }}>
                                    {{ $categoria->servico }}
                                </option>
                            @endforeach
                        </select>

 
                    </section>
                    <section>
                        <label for="descricao">Parte de uma descrição (colocar entre os simbos de %):</label>
                        <input class="entrada_texto" id="descricao" name="descricao" type="text" value="{{request('descricao')}}">
                    </section>
                </div>
            </section>

            <section class="grupoBotao">
                <input class="botao_pesquisar" type="submit" value="Pesquisar">
                <input class="botao_limpar" type="reset" value="Limpar">
            </section>
        </form>
            <section>
                <div class="areaTicket">
                    @foreach ($atendimentos as $atendimento)
                        <li class="pesquisa">
                            <strong class="pesquisa">Código:</strong> {{ $atendimento->codigo }} 
                            <strong class="pesquisa">| Servico:</strong> {{ $atendimento->servico }} 
                            <strong class="pesquisa">| Usuario:</strong> {{ $atendimento->usuario }} 
                            <a class="pesquisa" href="{{ route('atendimentoADM', $atendimento->codigo) }}">Ver detalhes</a>
                        </li>
                    @endforeach
                </div>
            </section>

    </main>

    @include('administrador.rodape')

@endsection