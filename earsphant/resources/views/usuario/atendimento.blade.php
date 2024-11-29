@extends('base')

@section('titles', 'Histórico')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/atendimento.css') }}>
@endsection


@section('pages')

    @include('usuario.cabecalho')
    
    <main class="element_flex_dad">
    
        <h1>Detalhes do Atendimento</h1>

        <div>
            <section>
        
                <label for="codigo"><strong>Código:</strong></label>
                <input type="text" id="codigo" name="codigo" value="{{ $atendimento->codigo }}" readonly>

                <label for="servico"><strong>Serviço:</strong></label>
                <input type="text" id="servico" name="servico" value="{{ $atendimento->servico}}" readonly>

                <label for="status"><strong>Status:</strong></label>
                <input type="text" id="status" name="status" value="{{ $atendimento->status }}" readonly>

                <label for="abertura"><strong>Data de Abertura:</strong></label>
                <input type="text" id="abertura" name="abertura" value="{{ $atendimento->abertura }}" readonly>
            
                <label for="fechamento"><strong>Data de Fechamento:</strong></label>
                <input type="text" id="fechamento" name="fechamento" value="{{ $atendimento->fechamento ?? 'Não finalizado' }}" readonly>
        
            </section>

            <section>

                <label for="descricao"><strong>Descrição:</strong></label>
                <textarea id="descricao" name="descricao" rows="4" cols="50" readonly>{{ $atendimento->descricao }}</textarea>

                <label for="notas"><strong>Notas:</strong></label>
                <div class="notas-container">
                    @foreach($notas as $nota)
                        <div class="nota-item">
                            <strong>{{ $nota->autor }}:</strong> <!-- Nome do autor -->
                            <input type="text" value="{{ $nota->descricao }}" readonly class="nota-input"> <!-- Descrição da nota -->
                        </div>
                    @endforeach
                </div>
    
                <!-- Links de Paginação -->
                <div class="pagination-container">
                    <!-- Botão Voltar -->
                    <a href="{{ $notas->previousPageUrl() }}" 
                       class="pagination-button @if ($notas->onFirstPage()) disabled @endif">
                        ← Voltar
                    </a>
            
                    <!-- Botão Próximo -->
                    <a href="{{ $notas->nextPageUrl() }}" 
                       class="pagination-button @if (!$notas->hasMorePages()) disabled @endif">
                        Próximo →
                    </a>
                </div>

            </section>

            <section>
                <!-- Exibindo as notas com o nome do autor -->
                
            </section>

            @if($atendimento->fechamento == null)
                <section>
                    <form action="{{ route('adicaoNotaUsuario', $atendimento->codigo) }}" method="POST" id="meuFormulario">
                        @csrf  <!-- CSRF Token para proteger o formulário -->
                        
                        <label for="resposta"><strong>Envie uma nova nota:</strong></label>
                        <textarea name="descricao" id="resposta" cols="30" rows="10" required></textarea>
                        <br><br>
                        <input type="submit" value="Enviar" id="button_nota">
                        <button id="button_reset"><a href="{{ route('inicioUsuario') }}" onclick="document.getElementById('meuFormulario').reset();">Desistir</a></button>
                    </form>
                </section>
            @endif

        </div>
    </main>

    @include('usuario.rodape')

@endsection