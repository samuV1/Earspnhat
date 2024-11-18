@extends('base')

@section('titles', 'Acesso ao sistema')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/login.css') }}>
@endsection


@section('pages')
    
    <main class="element_flex_dad">
        <a href="{{ route('index') }}"><img src="images/logo_index.png" alt="Logo do sistema earsphant com um elefante com as orelhas abertas"></a>


        <!--Formulário de login-->

        <form class="element_flex_dad" action={{ route( 'index' ) }} method="POST">

            <h2>Preencha os campos abaixo:</h2>

            <br>
            @csrf
            <label class="label_login" for="input_user">Usuário:</label>
            <input id="login" name="login" type="text" value="{{ old('user') }}">
            {{ $errors->has('user') ? $errors->first('user') : '' }}
            <br>

            <label class="label_login" for="input_password">Senha:</label>
            <input id="senha" name="senha" type="password" value="{{ old('password') }}">
            {{ $errors->has('password') ? $errors->first('password') : '' }}

            <br>

            <label class="label_login" for="dropdown_type_agent">Você é um usuário ou um administrador?</label>
            
            <select id="dropdown_type_agent" name="level_access">
                <option value="user">Usuário</option>
                <option value="admin">Administrador</option>
            </select>

            <br>

            <input id="unique_button" type="submit" value="Acessar">

        </form>
        @if ($errors->any())
        <div>
            <strong>{{ $errors->first('login') }}</strong>
        </div>
    @endif
        
    </main>

@endsection