@extends('base')

@section('titles', 'Editar serviço')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
        <h1>Editar Serviço</h1>

        <form id="form_sector" action={{ route('edit_service') }} method="POST">
            @csrf

            <section>
                <section id="format_form_sector">
                    <section class="section_form">
                        <label for="input_add_sector_name">Nome:</label>
                        <input class="input_text" id="input_add_sector_name" name="name" type="text">
                    </section>

                    <section class="section_form">
                        <label for="input_add_sector_id">Acordo a nível de serviço:</label>
                        <input class="input_text" id="input_add_sector_id" name="code" type="time">
                    </section>

                    <section class="section_form">
                        <label for="dropdown_soft_or_hard">Status</label>
                        <select class="input_droplist" id="dropdown_soft_or_hard" name="category">
                            <option value="active">Serviço Ativo</option>
                            <option value="obselete">Serviço Obsoleto</option>
                        </select>
                    </section>
                </section>
            </section>
            
            <section id="button_group">
                <input class="add_button" type="submit" value="Adicionar">
                <input class="cancel_button" type="reset" value="Desistir">
                <input class="remove_button" type="submit" value="Remover">
            </section>            

        </form>
        
    </main>

    @include('administrador.rodape')

@endsection