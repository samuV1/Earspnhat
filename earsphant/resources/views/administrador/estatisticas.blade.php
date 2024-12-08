@extends('base')

@section('titles', 'Estatísticas')

@section('estilo_pagina_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

@include('administrador.cabecalho')
    
    <main class="elemento_pai">

        <h1>Estatísticas</h1>

   
        
    </main>

    @include('administrador.rodape')

@endsection