@extends('layouts.app')

@section('title', 'Pendentes de atendimento')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Fila de chamados pendentes de atendimento</h3>
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
                            <th>Solicitante</th>
                            <th>Setor</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr class="align-middle">
                                <td># {{ $ticket->id }}</td>
                                <td>{{ $ticket->client->name }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->created_at }}</td>
                                <td>{{ $ticket->contact }}</td>
                                <td>{{ $ticket->sector->description }}</td>
                                <td class="text-nowrap text-end align-middle">
                                    <a class="btn btn-outline-success border rounded-circle" role="button" style="border-radius: 30px;width: 40px;margin-right: 10px;" href="{{ route('ticket.edit', $ticket->id) }}"><i class="fas fa-pen" style="width: 14px;height: 16px;"></i></a>
                                    <form action="{{ route('ticket.destroy', $ticket->id) }}" method="get" style="display: inline-block;"> 
                                        @method('DELETE')    
                                        @csrf
                                        <button class="btn btn-outline-danger border rounded-circle" type="submit" style="border-radius: 30px;" onclick="return confirm('Deseja mesmo apagar esse ticket?');"><i class="fas fa-trash-alt"></i></button>
                                    </form>
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
            <div class="row">
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