@extends('base')

@section('titles', 'Adicionar novo setor')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

    @include('admin_interfaces.header')
    
    <main class="element_flex_dad">
        
        <h1>Adicionar um Novo Setor</h1>

        <form id="form_sector" action={{ route('add_sector') }} method="POST">
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
            </section>
            

        </form>
        
    </main>

    @include('admin_interfaces.footer')

@endsection