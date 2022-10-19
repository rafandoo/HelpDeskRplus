@extends('layouts.app')

@section('title', 'Clientes')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Clientes</h3>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div id="dataTable_filter-1" class="dataTables_filter">
                        <form method="get">
                            <div class="d-flex">
                                <div style="margin-right: 20px;">
                                    <select class="form-select" id="filter" style="width: 145px;" name="filter">
                                        <option value="name">Nome</option>
                                        <option value="id">Código</option>
                                        <option value="cpf_cnpj">CPF/CNPJ</option>
                                    </select>
                                </div>
                                <div>
                                    <div class="input-group" style="width: 270px;">
                                        <input class="form-control form-control-sm" type="search" id="search" name="search" aria-controls="dataTable" placeholder="Buscar" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="text-end"><a class="btn btn-success" role="button" href="{{ route('client.create') }}"><i class="fas fa-plus"></i><span>&nbsp;Novo</span></a></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                            <th>CPF/CNPJ</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr class="align-middle">
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->cpf_cnpj }}</td>
                                <td>{{ $client->active == 1 ? 'Ativo' : 'Inativo' }}</td>
                                <td class="text-nowrap text-end align-middle">
                                    <a class="btn btn-outline-danger border rounded-circle" role="button" style="border-radius: 30px;margin-right: 10px;" href="{{ route('client.active', $client->id) }}" onclick="return confirm('Deseja mesmo mudar a situação desse cadastro?');">
                                        <i class="fas fa-lock"></i>
                                    </a>
                                    <a class="btn btn-outline-success border rounded-circle" role="button" style="border-radius: 30px;width: 40px;margin-right: 10px;" href="{{ route('client.edit', $client->id) }}">
                                        <i class="fas fa-pen" style="width: 14px;height: 16px;"></i>
                                    </a>
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
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando de 1 a {{ $clients->count() }} de {{ $clients->total() }} registros</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            @if($clients->currentPage() == 1)
                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $clients->previousPageUrl() }}" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            @endif
                            @for ($i = 1; $i <= $clients->lastPage(); $i++)
                                @if($clients->currentPage() == $i)
                                    <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $clients->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor
                            @if($clients->currentPage() == $clients->lastPage())
                                <li class="page-item disabled"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $clients->nextPageUrl() }}" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection