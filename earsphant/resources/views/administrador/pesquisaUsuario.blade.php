@extends('base')

@section('titles', 'Pesquisar usuário')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/search.css') }}>
@endsection


@section('pages')

    @include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
        <form action={{ route('pesquisarUsuario') }} method="POST">
            @csrf

            <label for="input_add_user_name">Nome:</label>
            <input class="input_text" id="input_add_user_name" name="name" type="text">

            <label for="input_add_user_sector">Setor:</label>
            <input class="input_text" id="input_add_user_sector" name="sector_code" type="text">

            <label for="dropdown_level_access">Acesso:</label>
            <select class="input_droplist" id="dropdown_level_access" name="access_level">
                <option value="user">Usuário</option>
                <option value="admin">Administrador</option>
            </select>

            <label for="input_add_user_login">Usuário:</label>
            <input class="input_text" id="input_add_user_login" name="login" type="text">
            
            <input class="add_button" type="submit" value="Pesquisar">

        </form>
        
        <section>

            <h1>Search Results</h1>

            @if ($users->isEmpty())
                <p>No users found.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sector Code</th>
                            <th>Access Level</th>
                            <th>Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->sector_code }}</td>
                                <td>{{ $user->access_level }}</td>
                                <td>{{ $user->login }}</td>
                                <td>
                                    <a href="{{ route('edit_user', $user->id) }}">Editar usuário</a>
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