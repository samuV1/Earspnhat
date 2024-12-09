@extends('base')

@section('titles', 'Editar serviço')

@section('estilo_pagina_css')
    <link rel="stylesheet" href={{ asset('css/modulo_administrador/crud.css') }}>
@endsection

@section('pagina')

@include('administrador.cabecalho')
    
    <main class="elemento_pai">
        
        <h1>Editar Serviço</h1>

        <form id="form_sector" action={{ route('edit_service') }} method="POST">
            @csrf

            <section>
                <section id="format_form_sector">
                    <section class="section_form">
                        <label for="input_add_sector_name">Nome:</label>
                        <input class="entrada_texto" id="input_add_sector_name" name="name" type="text">
                    </section>

                    <section class="section_form">
                        <label for="input_add_sector_id">Acordo a nível de serviço:</label>
                        <input class="entrada_texto" id="input_add_sector_id" name="code" type="time">
                    </section>

                    <section class="section_form">
                        <label for="dropdown_soft_or_hard">Status</label>
                        <select class="estrada_lista_suspensa" id="dropdown_soft_or_hard" name="category">
                            <option value="active">Serviço Ativo</option>
                            <option value="obselete">Serviço Obsoleto</option>
                        </select>
                    </section>
                </section>
            </section>
            
            <section id="button_group">
                <input class="add_button" type="submit" value="Adicionar">
                <input class="cancel_button" type="reset" value="Desistir">
                <input class="remove_button" type="submit" value="Remover">
            </section>            

        </form>
        
    </main>

    @include('administrador.rodape')

@endsection