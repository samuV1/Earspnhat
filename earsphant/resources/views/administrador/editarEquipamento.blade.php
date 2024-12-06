@extends('base')

@section('titles', 'Editar ativo')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">

        <h1>Editar Equipamento</h1>

        <form id="form_active" action="{{ route('adicionarEquipamento') }}" method="POST">
            @csrf
            <div id="format_form_active">
                <label for="input_add_active_license">Código/Patrimônio:</label>
                <input class="input_text" id="input_add_active_license" name="patrimonio" type="text" required>
        
                <label for="input_add_active_code">Tipo</label>
                <input class="input_text" id="input_add_active_code" name="tipo" type="text" required>
        
                <section class="section_form">
                    <label for="input_add_active_aquisition">Data de aquisição:</label>
                    <input class="input_date" id="input_add_active_aquisition" name="aquisicao" type="date" required>
        
                    <label for="dropdown_soft_or_hard">Equipamento alugado?</label>
                    <select class="input_droplist" id="dropdown_soft_or_hard" name="alugado" value="{{$equipamentos->alugado}}">
                        <option value="false">Não</option>
                        <option value="true">Sim</option>
                    </select>
                </section>
        
                <section class="section_form">
                    <label for="input_add_active_model">Marca:</label>
                    <input class="input_text" id="input_add_active_model" name="marca" type="text" value="{{$equipamentos->marca}}">
        
                    <label for="input_add_active_type">Modelo:</label>
                    <input class="input_text" id="input_add_active_type" name="modelo" type="text" value="{{$equipamentos->modelo}}">
        
                    <label for="input_add_active_brand">Fornecedor:</label>
                    <input class="input_text" id="input_add_active_brand" name="fornecedor" type="text" value="{{$equipamentos->fornecedor}}">
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