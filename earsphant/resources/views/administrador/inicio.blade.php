@extends('base')

@section('titles', 'Início')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/home.css') }}>
@endsection


@section('pages')

@include('administrador.cabecalho')
    
    <main class="elemento_pai">
        
        <h1>Inicio</h1>

        <div>Estatísticas</div>

        <div>Últimos atendimentos abertos</div>
        
    </main>

    @include('administrador.rodape')

@endsection