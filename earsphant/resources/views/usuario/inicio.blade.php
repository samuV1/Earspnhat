@extends('base')

@section('titles', 'Início')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/home.css') }}>
@endsection


@section('pages')

    @include('usuario.cabecalho')
    
    <main class="element_flex_dad">
        

        <h1>O que você deseja fazer?</h1>

        <section id="choices_user">
            <a class="choice_user" href="{{ route('abrirAtendimentos') }}">Abrir uma solicitação de atendimento</a>

            <a class="choice_user" href="{{ route('atendimentoHistoricoAberto') }}">Acompanhar um atendimento em aberto</a>

            <a class="choice_user" href="{{ route('tickets.historico') }}">Ver o seu histórico de solicitações</a>
        </section>
    </main>

    @include('usuario.rodape')

@endsection