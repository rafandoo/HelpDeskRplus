@extends('layouts.app')

@section('title', 'Tickets')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Fila de chamados</h3>
    <div class="card shadow">
        <div class="card-body" style="font-size: 14px;">
            <form method="get">
                <div class="row">
                    <div class="col-xl-4 col-xxl-3 offset-xxl-0" style="padding-left: 0px;">
                        <div id="dataTableFilter1" class="dataTables_filter">
                            <div style="margin-bottom: 15px;">
                                <div class="input-group"><span class="input-group-text">Prioridade</span>
                                    <select class="form-select" id="priority_filter" name="priority_filter">
                                        <option value="0">Selecione uma opção</option>
                                        @php 
                                            use App\Models\Priority;
                                            $priorities = Priority::all();
                                        @endphp
                                        @foreach ($priorities as $priority)
                                            <option value="{{ $priority->id }}" {{ isset($priority_filter) && $priority_filter == $priority->id ? 'selected' : '' }}>{{ $priority->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <div class="input-group"><span class="input-group-text">Estado</span>
                                    <select class="form-select" id="status_filter" name="status_filter">
                                        <option value="0">Selecione uma opção</option>
                                        @php 
                                            use App\Models\Status;
                                            $statuses = Status::all();
                                        @endphp
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" {{ isset($status_filter) && $status_filter == $status->id ? 'selected' : '' }}>{{ $status->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-xxl-3" style="padding-right: 0px;padding-left: 0px;">
                        <div id="dataTableFilter2" class="dataTables_filter">
                            <div style="margin-bottom: 15px;">
                                <div class="input-group"><span class="input-group-text">Categoria</span>
                                    <select class="form-select" id="category_filter" name="category_filter" style="margin-right: 10px;">
                                        <option value="0">Selecione uma opção</option>
                                        @php 
                                            use App\Models\Category;
                                            $categories = Category::all();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ isset($category_filter) && $category_filter == $category->id ? 'selected' : '' }}>{{ $category->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <div class="input-group"><span class="input-group-text">Tecnico</span>
                                    <select class="form-select" id="user_filter" name="user_filter" style="margin-right: 10px;">
                                        <option value="0">Selecione uma opção</option>
                                        @php 
                                            use App\Models\User;
                                            $users = User::all();
                                        @endphp
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ isset($user_filter) && $user_filter == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-xxl-3 offset-xxl-0" style="padding-left: 0px;padding-right: 0px;">
                        <div id="dataTableFilter3" class="dataTables_filter">
                            <div style="margin-bottom: 15px;">
                                <div class="input-group"><span class="input-group-text">Cliente</span>
                                    <input class="form-control" type="text" id="cliente" name="cliente">
                                    <input type="hidden" name="filtroCliente" id="idCliente" value="0">
                                    <button class="btn btn-primary" type="button" data-bs-target="#procurarCliente" data-bs-toggle="modal"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            <div class="modal fade input-group-text" role="dialog" tabindex="-1" id="procurarCliente" name="procurarCliente" style="padding-top: 0px;background: rgba(234,236,244,0);">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Procurar cliente</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="input-group">
                                                                    <select class="form-select" name="filtro" id="filtro">
                                                                        <option value="nome" selected="">Nome</option>
                                                                        <option value="idCliente">Código</option>
                                                                        <option value="cpfCnpj">CPF/CNPJ</option>
                                                                    </select>
                                                                    <input class="form-control" type="text" name="procurar" id="procurar" style="width: 461px;">
                                                                    <button class="btn btn-primary" type="button" onclick="filtrarCliente()">
                                                                        <i class="fas fa-search"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="table-responsive" role="grid">
                                                                <table class="table table-hover my-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Código</th>
                                                                            <th>Nome</th>
                                                                            <th>CFP/CNPJ</th>
                                                                            <th>Situação</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="dados" name="dados">
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer"></div>
                                                        </div>
                                                    </div>
                                                </div>
                            <div style="margin-bottom: 15px;">
                                <div class="input-group"><span class="input-group-text">Setor</span>
                                    <select class="form-select" id="sector_filter" name="sector_filter" style="margin-right: 10px;">
                                        <option value="0">Selecione uma opção</option>
                                        @php 
                                            use App\Models\Sector;
                                            $sectors = Sector::all();
                                        @endphp
                                        @foreach ($sectors as $sector)
                                            <option value="{{ $sector->id }}" {{ isset($sector_filter) && $sector_filter == $sector->id ? 'selected' : '' }}>{{ $sector->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-2 offset-xl-10 offset-xxl-1">
                        <div class="text-end" style="margin-bottom: 10px;"><button class="btn btn-warning" type="submit"><i class="fas fa-filter"></i><span>&nbsp;Filtrar</span></button><a class="btn btn-secondary" role="button" style="margin-left: 10px;" href="filaAtendimentos.php"><i class="far fa-times-circle"></i><span>&nbsp;Limpar</span></a></div>
                        <div class="text-end" style="margin-bottom: 10px;">
                            <a class="btn btn-success" role="button" href="{{ route('ticket.create') }}"><i class="fas fa-plus"></i><span>&nbsp;Novo</span></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body" style="font-size: 14px;">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Ticket</th>
                            <th>Cliente</th>
                            <th>Título</th>
                            <th>Data de abertura</th>
                            <th>Prioridade</th>
                            <th>Estado</th>
                            <th>Técnico</th>
                            <th>Atualizado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr class="align-middle">
                            <td># {{ $ticket->id }}</td>
                            <td>{{ $ticket->client->name }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->created_at }}</td>
                            <td>{{ $ticket->priority }}</td>
                            <td>{{ $ticket->status }}</td>
                            <td>{{ $ticket->user_id->name }}</td>
                            <td>{{ $ticket->updated_at }}</td>
                            <td class="text-nowrap text-end align-middle">
                                <!--<php if ($_SESSION['nivelAcesso'] != 3) echo "onclick='alertSemPermissao()'"; else echo "onclick='confirmExclusao($url)'";>-->
                                <a class="btn btn-outline-info border rounded-circle" role="button" style="border-radius: 30px;margin-right: 10px;width: 40px;" href=""><i class="far fa-eye" style="width: 15px;"></i></a>
                                <a class="btn btn-outline-danger border rounded-circle" role="button" style="border-radius: 30px;border-width: 1px;margin-right: 10px;"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="padding: 0px;"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row" hidden>
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando de 1 a 10 de 2</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection