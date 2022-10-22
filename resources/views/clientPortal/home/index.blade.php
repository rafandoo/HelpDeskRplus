@extends('clientPortal.layouts.app')

@section('title', 'Home')

@section('sideNav')
    @include('clientPortal.layouts.sidebar')
@endsection

@section('topNav')
    @include('clientPortal.layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Lista de chamados</h3>
    <form method="get">
        <div class="card shadow">
            <div class="card-body" style="font-size: 14px;">
                <div class="row">
                    <div class="col-xl-4 col-xxl-3 offset-xxl-0" style="padding-left: 0px;">
                        <div id="dataTableFilter1" class="dataTables_filter">
                            <div style="margin-bottom: 15px;">
                                <div class="input-group">
                                    <span class="input-group-text">Estado</span>
                                    <select class="form-select" id="status_filter" name="status_filter">
                                        <option value="0">Selecione uma opção</option>
                                        @php 
                                            $statuses = App\Models\Status::all();
                                        @endphp
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" {{ isset($_GET['status_filter']) && $_GET['status_filter'] == $status->id ? 'selected' : '' }}>{{ $status->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-xxl-2" style="padding-right: 0px;padding-left: 0px;">
                        <div id="dataTableFilter2" class="dataTables_filter">
                            <div style="margin-bottom: 15px;">
                                <div class="input-group">
                                    <span class="input-group-text">Ticket</span>
                                    <input class="form-control" type="text" id="ticket_filter" name="ticket_filter" style="margin-right: 10px;" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-2 offset-xl-10 offset-xxl-5">
                        <div class="text-end" style="margin-bottom: 10px;"><button class="btn btn-warning" type="submit"><i class="fas fa-filter"></i><span>Filtrar</span></button></div>
                        <div class="text-end" style="margin-bottom: 10px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="card shadow">
        <div class="card-body" style="font-size: 14px;">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Ticket</th>
                            <th>Título</th>
                            <th>Data de abertura</th>
                            <th>Estado</th>
                            <th>Técnico</th>
                            <th>Última atualização</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $tickets = App\Models\Ticket::where('client_id', Auth::user()->id)->get();
                        @endphp
                        @foreach ($tickets as $ticket)
                            <tr class="align-middle">
                                <td>#{{ $ticket->id }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->created_at }}</td>
                                <td>{{ $ticket->status_id->description }}</td>
                                <td>{{ if ($ticket->user_id) { $ticket->user_id->name; } else { 'Nenhum'; } }}</td>
                                <td>{{ $ticket->updated_at }}</td>
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
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando de 1 a {{ $tickets->count() }} de {{ $tickets->total() }} registros</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            @if ($tickets->currentPage() == 1)
                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $tickets->previousPageUrl() }}" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            @endif
                            @for ($i = 1; $i <= $tickets->lastPage(); $i++)
                                @if ($tickets->currentPage() == $i)
                                    <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $tickets->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor
                            @if ($tickets->currentPage() == $tickets->lastPage())
                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $tickets->nextPageUrl() }}" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection