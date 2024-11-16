@section('header_css')
    <link rel="stylesheet" href={{ asset('css/admin_module/header.css') }}>
@endsection

<header>
    <nav>
        <ul>
            <li>
                <div class="dropdown3">
                    <a onclick="toggleDropdown('myDropdown3')" class="dropbtn3">Pesquisar</a>
                    <div id="myDropdown3" class="dropdown-content3">
                        <a href="{{ route('search_ticket') }}">Pesquisar Solicitações</a>
                        <a href="{{ route('search_user') }}">Pesquisar Usuários</a>
                        <a href="{{ route('search_active') }}">Pesquisar Ativos</a>
                    </div>
                </div> 
            </li>
            <li><a class="nav" href="{{ route('inicioAdm') }}">Início</a></li>
            <li>
                <div class="dropdown">
                    <a onclick="toggleDropdown('myDropdown')" class="dropbtn">Solicitações</a>
                    <div id="myDropdown" class="dropdown-content">
                      <a href="#">Abrir Solicitação</a>
                      <a href="#">Minhas Filas</a>
                      <a href="#">Ver Solicitações Abertas</a>
                    </div>
                </div>  
            </li>
            <li><a class="nav" href="">Estatísticas</a></li>
            <li>
                <div class="dropdown2">
                    <a onclick="toggleDropdown('myDropdown2')" class="dropbtn2">Adicionar</a>
                    <div id="myDropdown2" class="dropdown-content2">
                      <a href="{{ route('adicionarUsuario') }}">Novo Usuário</a>
                      <a href="{{ route('adicionarSetor') }}">Novo Setor</a>
                      <a href="{{ route('adicionarAtivo') }}">Novo Ativo</a>
                      <a href="{{ route('adicionarServico') }}">Novo Serviço</a>
                    </div>
                </div>
            </li>
            <li><a class="nav" href="">Ajustes</a></li>
        </ul>
        <ul>
            <img src="/images/logo_index.png" alt="Logo do sistema earsphant com um elefante com as orelhas abertas">
        </ul>
    </nav>
</header>

<script>
    // Function to toggle dropdown
    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        dropdown.classList.toggle("show");
        // Close other dropdowns
        var dropdowns = document.querySelectorAll('.dropdown-content, .dropdown-content2, .dropdown-content3');
        dropdowns.forEach(function(drop) {
            if (drop.id !== dropdownId && drop.classList.contains('show')) {
                drop.classList.remove('show');
            }
        });
    }

    // Close dropdowns if the user clicks outside of them
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn') && !event.target.matches('.dropbtn2') && !event.target.matches('.dropbtn3')) {
            var dropdowns = document.querySelectorAll('.dropdown-content, .dropdown-content2, .dropdown-content3');
            dropdowns.forEach(function(drop) {
                if (drop.classList.contains('show')) {
                    drop.classList.remove('show');
                }
            });
        }
    }
</script>
