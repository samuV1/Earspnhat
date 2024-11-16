@extends('base')

@section('titles', 'Histórico')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/home.css') }}>
@endsection


@section('pages')

    @include('usuario.cabecalho')
    
    <main class="element_flex_dad">
        

        <h1>Atendimento</h1>

        
    </main>

    @include('usuario.rodape')

@endsection