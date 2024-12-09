@extends('base')

@section('titles', 'Início')

@section('estilo_pagina_css')
    <link rel="stylesheet" href={{ asset('css/modulo_administrador/home.css') }}>
@endsection


@section('pagina')

@include('administrador.cabecalho')
    
    <main class="elemento_pai">
        
        <h1>Inicio</h1>

        <div>Estatísticas</div>

        <div>Últimos atendimentos abertos</div>
        
    </main>

    @include('administrador.rodape')

@endsection