@extends('base')

@section('titles', 'Histórico')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/home.css') }}>
@endsection


@section('pages')

    @include('usuario.cabecalho')

    
    <main class="element_flex_dad">
        

        <a href="{{ route('atendimentos.finalizados', ['userId' => session('user_id')]) }}">Histórico</a>

        @if($atendimentos->isEmpty())
        <p>Você não possui atendimentos finalizados.</p>
        @else
            <ul>
                @foreach ($atendimentos as $atendimento)
                    <li>
                        <strong>Código:</strong> {{ $atendimento->codigo }} <br>
                        <strong>Descrição:</strong> {{ $atendimento->descricao }} <br>
                        <a href="{{ route('tickets.detalhes', $atendimento->codigo) }}">Ver detalhes</a>
                    </li>
                    <hr>
                @endforeach
            </ul>
        @endif

        
    </main>

    @include('usuario.rodape')

@endsection