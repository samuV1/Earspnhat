@extends('base')

@section('titles', 'Editar setor')

@section('estilo_pagina_css')
    <link rel="stylesheet" href={{ asset('css/modulo_administrador/crud.css') }}>
@endsection

@section('pagina')

@include('administrador.cabecalho')
    
    <main class="elemento_pai">
        
        <h1>Editar Setor</h1>

        <form id="formulario_editar_setor" action={{ route('editarSetor') }} method="POST">
            @csrf

            <section>
                <section id="formatacao_formulario_editar_setor">
                    <section class="secao_formulario">
                        <label for="name">Nome:</label>
                        <input class="entrada_texto" id="name" name="name" type="text" value="{{$setor->nome}}">
                    </section>

                    <section class="secao_formulario">
                        <label for="codigo">Identificação/Código do Setor:</label>
                        <input class="entrada_texto" id="codigo" name="codigo" type="number" value="{{$setor->codigo}}">
                    </section>
                </section>
            </section>
            
                <section id="grupo_botao">
                    <input class="botao_adicao" type="submit" value="Alterar">
                    <input class="botao_cancelar" type="reset" value="Desistir">
                    <input class="botao_remover" type="submit" value="Remover">
                </section>            

        </form>
        
    </main>

    @include('administrador.rodape')

@endsection