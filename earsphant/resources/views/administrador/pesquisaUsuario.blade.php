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

        {{-- Resultados da pesquisa --}}
        <section class="results mt-4">
            @if(isset($users) && $users->isEmpty())
                <p class="alert alert-warning">Nenhum usuário encontrado.</p>
            @elseif(isset($users))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Setor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nome }}</td>
                                <td>{{ $user->setor }}</td>
                                <td>
                                    {{-- Botões de ações (exemplo: editar ou excluir) --}}
                                    <a href="{{ route('edit_user', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('delete_user', ['id' => $user->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
       
    </main>

    @include('administrador.rodape')

@endsection