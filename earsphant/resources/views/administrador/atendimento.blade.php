@extends('base')

@section('titles', 'Detalhes')

@section('estilo_pagina_css')
    <link rel="stylesheet" href={{ asset('css/modulo_usuario/atendimento.css') }}>
@endsection


@section('pagina')

    @include('administrador.cabecalho')
    
    <main class="elemento_pai">
    
        <h1>Detalhes do Atendimento</h1>

        <div>
            <section>
        
                <label class="label" for="codigo"><strong>Código:</strong></label>
                <input type="text" id="codigo" name="codigo" value="{{ $atendimento->codigo }}" readonly>

                <label class="label" for="servico"><strong>Serviço:</strong></label>
                <input type="text" id="servico" name="servico" value="{{ $atendimento->servico}}" readonly>

                <label class="label" for="status"><strong>Status:</strong></label>
                <input type="text" id="status" name="status" value="{{ $atendimento->status }}" readonly>

                <label class="label" for="abertura"><strong>Data de Abertura:</strong></label>
                <input type="text" id="abertura" name="abertura" value="{{ $atendimento->abertura }}" readonly>
            
                <label class="label" for="fechamento"><strong>Data de Fechamento:</strong></label>
                <input type="text" id="fechamento" name="fechamento" value="{{ $atendimento->fechamento ?? 'Não finalizado' }}" readonly>
        
            </section>

            <section>

                <label class="label" for="descricao"><strong>Descrição:</strong></label>
                <textarea id="descricao" name="descricao" rows="10" cols="50" readonly>{{ $atendimento->descricao }}</textarea>

                <label class="label" for="notas"><strong>Notas:</strong></label>
                <div class="conteiner_notas">
                    @foreach($notas as $nota)
                        <div class="nota-item">
                            <strong>{{ $nota->autor }}:</strong> <!-- Nome do autor -->
                            <input type="text" value="{{ $nota->descricao }}" readonly class="nota_entrada"> <!-- Descrição da nota -->
                        </div>
                    @endforeach
                </div>
    
                <!-- Links de Paginação -->
                <div class="conteiner_paginacao">
                    <!-- Botão Voltar -->
                    <a href="{{ $notas->previousPageUrl() }}" 
                       class="botao_paginacao @if ($notas->onFirstPage()) disabled @endif">
                        ← Voltar
                    </a>
                    <p> &nbsp;|&nbsp; </p>
                    <!-- Botão Próximo -->
                    <a href="{{ $notas->nextPageUrl() }}" 
                       class="botao_paginacao @if (!$notas->hasMorePages()) disabled @endif">
                        Próximo →
                    </a>
                </div>

            </section>

       
         

            @if($atendimento->fechamento == null)
                <section>
                    <form action="{{ route('adicaoNotaUsuario', $atendimento->codigo) }}" method="POST" id="meuFormulario">
                        @csrf  <!-- CSRF Token para proteger o formulário -->
                        
                        <label for="resposta"><strong>Envie uma nova nota:</strong></label><br>
                        <textarea name="descricao" id="resposta" cols="30" rows="10" required></textarea>
                        <br><br>
                        <input type="submit" value="Enviar" id="botao_adiciona_nota">
                        <button id="botao_limpar"><a href="{{ route('inicioUsuario') }}" onclick="document.getElementById('meuFormulario').reset();">Desistir</a></button>
                    </form>
                </section>
            @endif

        </div>
    </main>

    @include('administrador.rodape')

@endsection