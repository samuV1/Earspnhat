@extends('base')

@section('titles', 'Abrir uma solicitação')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/crud.css') }}>
@endsection


@section('pages')

@include('usuario.cabecalho')

<main class="elemento_pai">
    <h1>Preencha os campos abaixo:</h1>

    <!-- Exibir mensagens de erro ou sucesso -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('erro'))
        <div class="alert alert-danger">
            {{ session('erro') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulário -->
    <form action="{{ route('armazenar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <section>
            <label for="">Informe o seu número de telefone para contato:</label>
            <input type="tel" name="telefone" value="{{ old('telefone') }}">
        </section>

            <label for="">Descreva abaixo o problema com máximo de detalhes:</label>          
            <textarea name="descricao" id="" cols="100" rows="10">{{ old('descricao') }}</textarea>

        <section>
            <label for="">Escolha um assunto relacionado a sua solicitação:</label>
            <select name="servico" id="">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->servico }}" {{ old('servico') == $categoria->servico ? 'selected' : '' }}>
                        {{ $categoria->servico }}
                    </option>
                @endforeach
            </select>
        </section>

        <section>
            <label for="">Informe o número de identificação do equipamento relacionado a sua solicitação:</label>
            <input type="text" name="equipamento_id" value="{{ old('equipamento_id') }}">
        </section>

        <section>
            <label for="">Envie uma foto ou arquivo relacionado a sua demanda</label>
            <input type="file" name="arquivo">
        </section>

        <section>
            <br><br>
            <input type="submit" value="Abrir a Solicitação" id="button_open_ticket">
            <button id="button_reset"><a href="{{ route('inicioUsuario') }}" onclick="document.getElementById('meuFormulario').reset();">Desistir</a></button>
        </section>
    </form>

</main>

    @include('usuario.rodape')

@endsection