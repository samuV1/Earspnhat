@extends('base')

@section('titles', 'Adicionar novo serviço')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/crud.css') }}>
@endsection

@section('pages')

@include('administrador.cabecalho')
    
    <main class="element_flex_dad">
        
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h1>Adicionar um novo Serviço</h1>

        <form id="form_service" action={{ route('adicionarServico') }} method="POST">
            @csrf

            <section>
                <section id="format_form_sector">
                    <section class="section_form">
                        <label for="input_add_sector_name">Nome:</label>
                        <input class="input_text" id="input_add_sector_name" name="servico" type="text">
                    </section>

                    <section class="section_form">
                        <label for="input_add_sector_id">Acordo a nível de serviço (em horas):</label>
                        <select class="input_text" id="input_add_sector_id" name="ans">
                            <!-- Opção Default -->
                            <option value='00:00:00' selected>Sem previsão</option>
                            
                            <!-- Opções de 1 a 24 horas -->
                            <optgroup label="Horas">
                                <option value="01:00:00">1 hora</option>
                                <option value="02:00:00">2 horas</option>
                                <option value="03:00:00">3 horas</option>
                                <option value="04:00:00">4 horas</option>
                                <option value="05:00:00">5 horas</option>
                                <option value="06:00:00">6 horas</option>
                                <option value="07:00:00">7 horas</option>
                                <option value="08:00:00">8 horas</option>
                                <option value="09:00:00">9 horas</option>
                                <option value="10:00:00">10 horas</option>
                            </optgroup>
                    
                            <!-- Opções de 1 a 3 dias -->
                            <optgroup label="Dias">
                                <option value="24:00:00">1 dia</option>
                                <option value="48:00:00">2 dias</option>
                                <option value="72:00:00">3 dias</option>
                            </optgroup>
                        </select>
                    </section>
                </section>
            </section>
            
            <section id="button_group">
                <input class="add_button" type="submit" value="Adicionar">
                <input class="cancel_button" type="reset" value="Desistir">
            </section>            

        </form>
        
    </main>

    @include('administrador.rodape')

@endsection