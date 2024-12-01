@extends('base')

@section('titles', 'Adicionar novo ativo')

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

        <h1>Adicionar um Novo Equipamento</h1>

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
                    <select class="input_droplist" id="dropdown_soft_or_hard" name="alugado" required>
                        <option value="false">Não</option>
                        <option value="true">Sim</option>
                    </select>
                </section>
        
                <section class="section_form">
                    <label for="input_add_active_model">Marca:</label>
                    <input class="input_text" id="input_add_active_model" name="marca" type="text">
        
                    <label for="input_add_active_type">Modelo:</label>
                    <input class="input_text" id="input_add_active_type" name="modelo" type="text">
        
                    <label for="input_add_active_brand">Fornecedor:</label>
                    <input class="input_text" id="input_add_active_brand" name="fornecedor" type="text">
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