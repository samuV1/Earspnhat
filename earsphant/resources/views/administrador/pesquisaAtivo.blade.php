@extends('base')

@section('titles', 'Pesquisar ativo')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/search.css') }}>
@endsection


@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
    @csrf
            <div class="form-group">
                <label for="ativo_id">ID do Ativo:</label>
                <input type="text" id="ativo_id" name="ativo_id" value="{{ request()->get('ativo_id') }}" placeholder="ID do Ativo" class="form-control">
            </div>

            <div class="form-group">
                <label for="nome_ativo">Nome do Ativo:</label>
                <input type="text" id="nome_ativo" name="nome_ativo" value="{{ request()->get('nome_ativo') }}" placeholder="Nome do Ativo" class="form-control">
            </div>

            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" id="categoria" name="categoria" value="{{ request()->get('categoria') }}" placeholder="Categoria do Ativo" class="form-control">
            </div>

            <div class="form-group">
                <label for="valor_min">Valor Mínimo:</label>
                <input type="number" id="valor_min" name="valor_min" value="{{ request()->get('valor_min') }}" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="valor_max">Valor Máximo:</label>
                <input type="number" id="valor_max" name="valor_max" value="{{ request()->get('valor_max') }}" step="0.01" class="form-control">
            </div>

            <div class="form-group">
                <label for="data_aquisicao">Data de Aquisição:</label>
                <input type="date" id="data_aquisicao" name="data_aquisicao" value="{{ request()->get('data_aquisicao') }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>

        
    </main>

    @include('administrador.rodape')

@endsection