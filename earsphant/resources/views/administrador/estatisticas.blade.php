@extends('base')

@section('titles', 'Estatísticas')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">

        <h1>Estatísticas</h1>

   
        
    </main>

    @include('administrador.rodape')

@endsection