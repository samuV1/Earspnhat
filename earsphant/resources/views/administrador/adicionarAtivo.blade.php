@extends('base')

@section('titles', 'Adicionar novo ativo')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">

        <h1>Adicionar um Novo Ativo</h1>

        <form id="form_active" action="">
            @csrf
            <div id="format_form_active" action={{ route('adicionarAtivo') }} method="POST">
                
                <label for="input_add_active_license">Licença/Código:</label>
                <input class="input_text" id="input_add_active_license" name="license" type="text">

                <label for="input_add_active_code">Numeração Interna/Patrimônio:</label>
                <input class="input_text" id="input_add_active_code" name="code" type="text">
                
                <section  class="section_form">
                    <label for="input_add_active_aquisition">Data de aquisição:</label>
                    <input class="input_date" id="input_add_active_aquisition" name="aquisition" type="date">

                    <label for="dropdown_soft_or_hard">Software ou Hardware?</label>
                    <select class="input_droplist" id="dropdown_soft_or_hard" name="category">
                        <option value="soft">Software</option>
                        <option value="hard">Hardware</option>
                    </select>
                </section>

                <section  class="section_form">
                    <label for="input_add_active_model">Modelo:</label>
                    <input class="input_text" id="input_add_active_model" name="model"  type="text">

                    <label for="input_add_active_brand">Marca:</label>
                    <input class="input_text" id="input_add_active_brand" name="brand" type="text">
                    
                    <label for="input_add_active_type">Tipo:</label>
                    <input class="input_text" id="input_add_active_type" name="type" type="text">
                </section>
            </div>

            <section id="button_group">
                <input class="add_button" type="submit" value="Adicionar">
                <input class="cancel_button" type="reset" value="Desistir">
            </section>

        </form>
        
    </main>

    @include('administrador.rodape')

@endsection