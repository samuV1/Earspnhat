@extends('base')

@section('titles', 'Editar usuário')

@section('style_page_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/home.css') }}>
@endsection


@section('pages')

    @include('admin_interfaces.header')
    
    <main class="element_flex_dad">
        
        <h1>Inicio</h1>
        
    </main>

    @include('admin_interfaces.footer')

@endsection