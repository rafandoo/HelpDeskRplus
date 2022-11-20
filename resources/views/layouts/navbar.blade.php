<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Buscar chamado"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
        </form>
        <ul class="navbar-nav flex-nowrap ms-auto">
            <li class="nav-item dropdown no-arrow mx-1"></li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow">
                <div class="nav-item dropdown no-arrow">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                        <span class="d-none d-lg-inline me-2 text-gray-600 small">{{ Auth::user()->name }}</span>
                        <img class="border rounded-circle img-profile" src="{{ asset('assets/img/logo/rplus.png') }}">
                    </a>
                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                        <a class="dropdown-item" href="{{ route('user.profile', Auth::user()->id) }}">
                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout
                            </a>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
