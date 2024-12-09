@extends('base')

@section('titles', 'Adicionar novo setor')

@section('estilo_pagina_css')
    <link rel="stylesheet" href={{ asset('css/modulo_administrador/crud.css') }}>
@endsection

@section('pagina')

@include('administrador.cabecalho')
    
    <main class="elemento_pai">
        
        <!-- Exibir mensagem de sucesso se existir -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h1>Adicionar um Novo Setor</h1>

        <form id="form_sector" action={{ route('adicionarSetor') }} method="POST">
            @csrf

            <section>
                <section id="format_form_sector">
                    <section class="section_form">
                        <label for="input_add_sector_name">Nome:</label>
                        <input class="entrada_texto" id="input_add_sector_name" name="nome" type="text" value="{{ old('nome') }}">
                        @error('nome')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </section>
    
                    <section class="section_form">
                        <label for="input_add_sector_id">Identificação/Código do Setor:</label>
                        <input class="entrada_texto" id="input_add_sector_id" name="codigo" type="number" value="{{ old('codigo') }}">
                        @error('codigo')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </section>
                </section>
            </section>
            
            <section id="button_group">
                <input class="add_button" type="submit" value="Adicionar">
                <input class="cancel_button" type="reset" value="Desistir">
            </section>
            

        </form>
        
    </main>

    @include('administrador.rodape')

@endsection