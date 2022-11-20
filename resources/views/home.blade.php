@extends('layouts.app')

@section('title', 'Home')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Home&nbsp;</h3>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4"><a style="text-decoration: none;" href="{{ route('ticket.outstanding') }}" >
                <div class="card shadow border-start-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-danger fw-bold text-xs mb-1"><span>Aguardando Atendimento</span></div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $tickets->where('status_id', 1)->count() }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-hourglass-half fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </a></div>
        <div class="col-md-6 col-xl-3 mb-4"><a href="filaAtendimentos.php?filtroPrioridade=0&filtroStatus=3&filtroCategoria=0&filtroUsuario=0&cliente=&filtroCliente=0&filtro=nome&procurar=&filtroSetor=0" style="text-decoration: none;">
                <div class="card shadow border-start-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Em atendimento</span></div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $tickets->where('status_id', 2)->count() }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-play fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </a></div>
        <div class="col-md-6 col-xl-3 mb-4"><a href="filaAtendimentos.php?filtroPrioridade=0&filtroStatus=2&filtroCategoria=0&filtroUsuario=0&cliente=&filtroCliente=0&filtro=nome&procurar=&filtroSetor=0" style="text-decoration: none;">
                <div class="card shadow border-start-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Pendentes</span></div>
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto">
                                        <div class="text-dark fw-bold h5 mb-0"><span>{{ $tickets->where('status_id', 3)->count() }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"><i class="fas fa-user-clock fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </a></div>
        <div class="col-md-6 col-xl-3 mb-4">
            <a href="#" style="text-decoration: none;">
                <div class="card shadow border-start-primary py-2" style="text-decoration: none;">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span class="text-info">Finalizados</span></div>
                                @php $data = date('Y-m-d'); @endphp
                                <div class="text-dark fw-bold h5 mb-0"><span>{{ $tickets->where('status_id', 4)->where('closed_at', '>=', $data)->count() }}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-check-circle fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3"></div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row d-flex" style="margin-top: 5px;">
                                <div class="w-100"></div>
                                <div class="col d-xxl-flex align-items-xxl-center">
                                    <h5 class="text-dark fw-bold m-0">Lista de Tarefas</h5>
                                </div>
                                <div class="col text-end d-xxl-flex justify-content-xxl-end align-items-xxl-center"><a class="btn btn-info btn-sm btn-circle ms-1" role="button"><i class="fas fa-plus text-white"></i></a></div>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row align-items-center no-gutters">
                                    <div class="col col-auto"><button class="btn btn-outline-success btn-sm btn-circle ms-1" type="button"><i class="fas fa-check"></i></button></div>
                                    <div class="col me-2">
                                        <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">10:30 AM</span>
                                    </div>
                                    <div class="col-auto"><button class="btn btn-outline-danger btn-sm btn-circle ms-1" type="button"><i class="far fa-trash-alt"></i></button></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center no-gutters">
                                    <div class="col col-auto"><button class="btn btn-outline-success btn-sm btn-circle ms-1" type="button"><i class="fas fa-check"></i></button></div>
                                    <div class="col me-2">
                                        <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">10:30 AM</span>
                                    </div>
                                    <div class="col-auto"><button class="btn btn-outline-danger btn-sm btn-circle ms-1" type="button"><i class="far fa-trash-alt"></i></button></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row align-items-center no-gutters">
                                    <div class="col col-auto"><button class="btn btn-outline-success btn-sm btn-circle ms-1" type="button"><i class="fas fa-check"></i></button></div>
                                    <div class="col me-2">
                                        <h6 class="mb-0"><strong>Lunch meeting</strong></h6><span class="text-xs">10:30 AM</span>
                                    </div>
                                    <div class="col-auto"><button class="btn btn-outline-danger btn-sm btn-circle ms-1" type="button"><i class="far fa-trash-alt"></i></button></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection