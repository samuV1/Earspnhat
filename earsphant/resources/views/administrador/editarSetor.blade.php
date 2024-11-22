@extends('base')

@section('titles', 'Editar setor')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
        <h1>Editar Setor</h1>

        <form id="form_sector" action={{ route('edit_sector') }} method="POST">
            @csrf

            <section>
                <section id="format_form_sector">
                    <section class="section_form">
                        <label for="input_add_sector_name">Nome:</label>
                        <input class="input_text" id="input_add_sector_name" name="name" type="text">
                    </section>

                    <section class="section_form">
                        <label for="input_add_sector_id">Identificação/Código do Setor:</label>
                        <input class="input_text" id="input_add_sector_id" name="code" type="number">
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