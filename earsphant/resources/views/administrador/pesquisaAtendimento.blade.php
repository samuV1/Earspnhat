@extends('base')

@section('titles', 'Pesquisar ticket')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/search.css') }}>
@endsection


@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
    <h1>Adicionar um Novo Usuário</h1>
               
                <form action="" method="GET" class="search-form">
            @csrf
            <div class="form-group">
                <label for="ticket_id">ID do Ticket:</label>
                <input type="text" id="ticket_id" name="ticket_id" value="{{ request()->get('ticket_id') }}" placeholder="ID do Ticket" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_name">Nome do Usuário:</label>
                <input type="text" id="user_name" name="user_name" value="{{ request()->get('user_name') }}" placeholder="Nome do Usuário" class="form-control">
            </div>

            <div class="form-group">
                <label for="assunto">Assunto:</label>
                <input type="text" id="assunto" name="assunto" value="{{ request()->get('assunto') }}" placeholder="Assunto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>

        
    </main>

    @include('administrador.rodape')

@endsection