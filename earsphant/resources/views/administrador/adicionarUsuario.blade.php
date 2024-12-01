@extends('base')

@section('titles', 'Adicionar novo usuário')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection


@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
         <!-- Exibir mensagem de sucesso se existir -->
         @if(session('success'))
         <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h1>Adicionar um Novo Usuário</h1>

        <form id="form_user" action="{{ route('adicionarUsuario') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <section id="format_form_user">

                <div id="div_details_user">
                    
                    <section class="format_form_sections">
                        <label for="input_add_user_name">Nome:</label>
                        <input class="input_text" id="input_add_user_name" name="nome" type="text">
                    </section>
                    <section class="format_form_sections">
                        <label for="input_add_user_sector">Setor:</label>
                        <input class="input_text" id="input_add_user_sector" name="setor" type="text">
                        <label for="dropdown_level_access">Acesso:</label>
                        <select class="input_droplist" id="dropdown_level_access" name="acesso">
                        <option value="0">Usuário</option>
                        <option value="1">Técnico (nível 1)</option>
                        <option value="2">Analista (nível 2)</option>
                        <option value="3">Administrador</option>
                    </select>
                    </section>
                    <section class="format_form_sections">
                        <label for="input_add_user_login">Usuário:</label>
                        <input class="input_text" id="input_add_user_login" name="login" type="text">
                    
                        <label for="input_add_user_password">Senha:</label>
                        <input class="input_text" id="input_add_user_password" name="senha" type="text">                
                    </section>
                </div>

                <div id="div_picture_profile"> 
                    <h3>Foto do Perfil:</h3>

                    <img id="preview" src="/images/user.jpg" alt="Preview da Imagem">

                    <label id="bunton_choice_picture" for="fileInput">Escolher Imagem</label>
                    <input type="file" id="fileInput" class="inputpicture" accept="image/*" nome="url_foto">
                        
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
                <input class="add_button" type="submit" value="Adicionar">
                <input class="cancel_button" type="reset" value="Desistir">
            </section>


        </form>
        
    </main>

    @include('administrador.rodape')

@endsection