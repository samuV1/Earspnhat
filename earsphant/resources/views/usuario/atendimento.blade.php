@extends('base')

@section('titles', 'Histórico')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/home.css') }}>
@endsection


@section('pages')

    @include('usuario.cabecalho')
    
    <main class="element_flex_dad">
    
        <h1>Detalhes do Atendimento</h1>
    
        <label for="codigo"><strong>Código:</strong></label>
        <input type="text" id="codigo" name="codigo" value="{{ $atendimento->codigo }}" readonly>
    
        <label for="descricao"><strong>Descrição:</strong></label>
        <textarea id="descricao" name="descricao" rows="4" cols="50" readonly>{{ $atendimento->descricao }}</textarea>
    
        <label for="status"><strong>Status:</strong></label>
        <input type="text" id="status" name="status" value="{{ $atendimento->status }}" readonly>
    
        <label for="abertura"><strong>Data de Abertura:</strong></label>
        <input type="text" id="abertura" name="abertura" value="{{ $atendimento->abertura }}" readonly>
    
        <label for="fechamento"><strong>Data de Fechamento:</strong></label>
        <input type="text" id="fechamento" name="fechamento" value="{{ $atendimento->fechamento ?? 'Não finalizado' }}" readonly>

        @if($atendimento->fechamento == null)
            <textarea name="" id="" cols="30" rows="10"></textarea>
        @endif
    </main>

    @include('usuario.rodape')

@endsection