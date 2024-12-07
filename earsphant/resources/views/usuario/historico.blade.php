@extends('base')

@section('titles', 'Histórico')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/historico.css') }}>
@endsection


@section('pages')

    @include('usuario.cabecalho')

    
    <main class="element_flex_dad">
        

        <h1>Histórico</h1>

        <div class="areaTicket">
            @if($atendimentos->isEmpty())
            <p class="historico">Você não possui atendimentos finalizados.</p>
            @else
                <ul class="historico">
                    @foreach ($atendimentos as $atendimento)
                        <li class="historico">
                            <strong class="historico">Código:</strong> {{ $atendimento->codigo }} 
                            <strong class="historico">| Serviço:</strong> {{ $atendimento->servico }} 
                            <strong class="historico">| Data de Fechamento:</strong> {{ \Carbon\Carbon::parse($atendimento->abertura)->format('d/m/Y H:i') }} <br>
                            <a class="historico" href="{{ route('atendimento', $atendimento->codigo) }}">Ver detalhes</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        
    </main>

    @include('usuario.rodape')

@endsection