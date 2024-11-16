@extends('base')

@section('titles', 'Abrir uma solicitação')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/user_module/crud.css') }}>
@endsection


@section('pages')

    @include('usuario.cabecalho')

    
    <main class="element_flex_dad">

        <h1>Preencha os campos abaixos:</h1>

        <form action="">
            @csrf
            <section>
                <label for="">Informe o seu número de telefone para contato:</label>
                <input type="tel">
            </section>
            
            <label for="">Descreva abaixo o problema com máximo de detalhes:</label>
            <textarea name="" id="" cols="100" rows="10"></textarea>
            
            <section>
                <label for="">Escolha um assunto relacionado a sua solicitação:</label>
                <select name="" id="">
                <option value="">Equipamento danificado</option>
                <option value="">Mudança de equipamento de local</option>
                <option value="">Erro no programa</option>
                </select>
            </section>
            <section>
                <label for="">Informe o número de identificação do equipamento relacionado a sua solcitação:</label>
                <input type="text">
            </section>
            <section>
                <label for="">Nos envie uma foto ou arquivo relacionado a sua demanda</label>
                <input type="file">
            </section>
            <section>
                <br><br>
                <input type="submit" value="Abrir a Solicitação" id="button_open_ticket">
                <input type="reset" value="Desistir" id="button_reset">
            </section>
        </form>
        
    </main>

    @include('usuario.rodape')

@endsection