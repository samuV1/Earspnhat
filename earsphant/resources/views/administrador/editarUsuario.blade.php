@extends('base')

@section('titles', 'Editar usuário')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection


@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
        <h1>Editar Usuário</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form id="form_user" action="{{ route('editarUsuario') }}" method="POST">
        @csrf
        <!-- <section>
                <h3>Foto de Pefil</h3>

                <img src="" alt="">
                <input type="file" name="URL_picture" id="avatar_picture">
            </section>
        -->

        <section id="format_form_user">

            <div id="div_details_user">
                
                <section class="format_form_sections">
                    <label for="input_add_user_name">Nome:</label>
                    <input class="input_text" id="input_add_user_name" name="name" type="text" value="{{ old('name', $user->name) }}">
                </section>
                <section class="format_form_sections">
                    <label for="input_add_user_sector">Setor:</label>
                    <input class="input_text" id="input_add_user_sector" name="sector_code" type="text" value="{{ old('sector_code', $user->sector_code) }}">
                    <label for="dropdown_level_access">Acesso:</label>
                    <select class="input_droplist" id="dropdown_level_access" name="access_level">
                        <option value="user" {{ old('access_level', $user->access_level) == 'user' ? 'selected' : '' }}>Usuário</option>
                        <option value="admin" {{ old('access_level', $user->access_level) == 'admin' ? 'selected' : '' }}>Administrador</option>
                    </select>
                </section>
                <section class="format_form_sections">
                    <label for="input_add_user_login">Usuário:</label>
                    <input class="input_text" id="input_add_user_login" name="login" type="text" value="{{ old('login', $user->login) }}">
                
                    <label for="input_add_user_password">Senha:</label>
                    <input class="input_text" id="input_add_user_password" name="password" type="password">
                    <label for="input_add_user_password_confirmation">Confirmar Senha:</label>
                    <input class="input_text" id="input_add_user_password_confirmation" name="password_confirmation" type="password">
                </section>
            </div>

            <div id="div_picture_profile"> 
                <h3>Foto do Perfil:</h3>

                <img id="preview" src="/images/user.jpg" alt="Preview da Imagem">

                <label id="bunton_choice_picture" for="fileInput">Escolher Imagem</label>
                <input type="file" id="fileInput" class="inputpicture" accept="image/*">
                    
                <script>
                    const fileInput = document.getElementById('fileInput');
                    const preview = document.getElementById('preview');

                    fileInput.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(event) {                                        preview.src = event.target.result;
                            }
                            reader.readAsDataURL(file);
                        } else {
                            preview.src = '#';
                        }
                    });
                </script>
                
            </div>

        </section>

        <section id="button_group">
            <input class="add_button" type="submit" value="Salvar Alterações">
            <input class="cancel_button" type="reset" value="Desistir">
            <input class="remove_button" type="submit" value="Remover">
        </section>
    </form>
        
    </main>

    @include('administrador.rodape')

@endsection