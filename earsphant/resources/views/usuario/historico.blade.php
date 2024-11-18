@extends('base')

@section('titles', 'Histórico')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/home.css') }}>
@endsection


@section('pages')

    @include('usuario.cabecalho')

    
    <main class="element_flex_dad">
        

        <h1>Historico</h1>

        @if($tickets->isEmpty())
            <p>Nenhum atendimento finalizado encontrado.</p>
        @else
            <ul>
                @foreach($tickets as $ticket)
                    <li>
                        <a href="{{ route('atendimentos.show', $ticket->id) }}">
                            Código: {{ $ticket->codigo }} - {{ $ticket->descricao }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        
    </main>

    @include('usuario.rodape')

@endsection