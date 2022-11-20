<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('assets/img/logo/rplus.png') }}" style="width: 70px;">
            </div>
            <div class="sidebar-brand-text mx-3"><span>help desk</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="{{ route('home')}}"><i class="fas fa-home"></i><span>Home</span></a></li>
            <li class="nav-item">
                <div>
                    <a data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-3" href="#collapse-3" role="button" class="nav-link">
                        <i class="fas fa-tasks"></i>&nbsp;
                        <span>Atendimentos</span>
                    </a>
                    <div class="collapse" id="collapse-3">
                        <div class="bg-white border rounded collapse-inner">
                            <a class="collapse-item" href="{{ route('ticket.create')}}">Novo chamado</a>
                            <a class="collapse-item" href="{{ route('ticket.index')}}">Meus chamados</a>
                            <a class="collapse-item" href="{{ route('ticket.outstanding')}}">Pendentes</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div>
                    <a data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1" role="button" class="nav-link">
                        <i class="fas fa-user"></i>&nbsp;
                        <span>Cadastros</span>
                    </a>
                    <div class="collapse" id="collapse-1">
                        <div class="bg-white border rounded collapse-inner">
                            <a class="collapse-item" href="{{ route('client.index') }}">Clientes</a>
                            <a class="collapse-item" href="{{ route('user.index') }}">Usuários</a>
                            <a class="collapse-item" href="{{ route('sector.index') }}">Setores</a>
                            <a class="collapse-item" href="{{ route('category.index') }}">Categorias</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div><a data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-2" href="#collapse-2" role="button" class="nav-link"><i class="fas fa-chart-bar"></i>&nbsp;<span>Gerencial</span></a>
                    <div class="collapse" id="collapse-2">
                        <div class="bg-white border rounded collapse-inner"><a class="collapse-item" href="404.php">Dashboard</a><a class="collapse-item" href="relatorios.php">Relatórios</a></div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <a class="nav-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-arrow-circle-left"></i><span>&nbsp;Sair</span>
                    </a>
                </form>
            </li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>