@extends('base')

@section('titles', 'Pesquisar usuário')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/search.css') }}>
@endsection


@section('pages')

    @include('administrador.cabecalho')
    
    <main class="element_flex_dad">

    @csrf
            <div class="form-group">
                <label for="user_id">ID do Usuário:</label>
                <input type="text" id="user_id" name="user_id" value="{{ request()->get('user_id') }}" placeholder="ID do Usuário" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_name">Nome do Usuário:</label>
                <input type="text" id="user_name" name="user_name" value="{{ request()->get('user_name') }}" placeholder="Nome do Usuário" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>

        
       
    </main>

    @include('administrador.rodape')

@endsection