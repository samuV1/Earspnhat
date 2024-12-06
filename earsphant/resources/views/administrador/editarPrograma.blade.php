@extends('base')

@section('titles', 'Editar ativo')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">

        <h1>Editar Ativo</h1>
        
        <form id="form_active" action="{{ route('adicionarPrograma') }}" method="POST">
            @csrf
            <div id="format_form_active">
                                
                    <label for="input_add_active_license">Licença:</label>
                    <input class="input_text" id="input_add_active_license" name="licenca" type="text">
    
                    <label for="input_add_active_code">Numeração Interna:</label>
                    <input class="input_text" id="input_add_active_code" name="codigo" type="text">
                    
                    <section  class="section_form">
                        <label for="input_add_active_aquisition">Data de aquisição:</label>
                        <input class="input_date" id="input_add_active_aquisition" name="aquisicao" type="date">
    
                        <label for="dropdown_soft_or_hard">Desenvolvido por terceiros?</label>
                        <select class="input_droplist" id="dropdown_soft_or_hard" name="terceiros">
                            <option value="false">Não</option>
                            <option value="true">Sim</option>
                        </select>
                    </section>
    
                    <section  class="section_form">
                        <label for="input_add_active_model">Nome:</label>
                        <input class="input_text" id="input_add_active_model" name="nome"  type="text">
    
                        <label for="input_add_active_brand">Fornecedor:</label>
                        <input class="input_text" id="input_add_active_brand" name="fornecedor" type="text">
                        
                        <label for="input_add_active_type">Versão:</label>
                        <input class="input_text" id="input_add_active_type" name="versao" type="text">
                    </section>
                </div>

            <section id="button_group">
                <input class="add_button" type="submit" value="Alterar">
                <input class="cancel_button" type="reset" value="Desistir">
                <input class="remove_button" type="submit" value="Remover">
            </section>

        </form>
        
    </main>

    @include('administrador.rodape')

@endsection