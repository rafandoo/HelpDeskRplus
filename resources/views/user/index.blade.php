@extends('layouts.app')

@section('title', 'Usuarios')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Usuários</h3>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <form method="get">
                            <div class="d-flex">
                                <div style="margin-right: 20px;">
                                    <select class="form-select" id="filter" style="width: 145px;" name="filter">
                                        <option value="name">Nome</option>
                                        <option value="id">Codigo</option>
                                        <option value="login">Login</option>
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
                <div class="col-xl-3">
                    <div class="text-end">
                        <a class="btn btn-success" role="button" href="{{ route('user.create') }}">
                            <i class="fas fa-plus"></i>
                            <span>&nbsp;Novo</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Login</th>
                            <th>E-mail</th>
                            <th>Nível de acesso</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="align-middle">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name . ' ' . $user->last_name }}</td>
                                <td>{{ $user->login }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ App\Models\AccessLevel::find($user->access_level)->name }}</td>
                                <td>{{ $user->active == 1 ? 'Ativo' : 'Inativo' }}</td>
                                <td class="text-end align-middle">
                                    <a class="btn btn-outline-danger border rounded-circle" role="button" style="border-radius: 30px;margin-right: 10px;" href="{{ route('user.active', $user->id) }}" onclick="return confirm('Deseja mesmo mudar a situação desse cadastro?');">
                                        <i class="fas fa-lock"></i>
                                    </a>
                                    <a class="btn btn-outline-success border rounded-circle" role="button" style="border-radius: 30px;width: 40px;margin-right: 10px;" href="{{ route('user.edit', $user->id) }}">
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
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Mostrando de 1 a {{ $users->count() }} de {{ $users->total() }} registros</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            @if ($users->currentPage() == 1)
                                <li class="page-item disabled">
                                    <a class="page-link" aria-label="Previous" href="#">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" aria-label="Previous" href="{{ $users->previousPageUrl() }}">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                            @endif
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                @if ($users->currentPage() == $i)
                                    <li class="page-item active">
                                        <a class="page-link" href="#">{{ $i }}</a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endif
                            @endfor
                            @if ($users->currentPage() == $users->lastPage())
                                <li class="page-item disabled">
                                    <a class="page-link" aria-label="Next" href="#">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" aria-label="Next" href="{{ $users->nextPageUrl() }}">
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection