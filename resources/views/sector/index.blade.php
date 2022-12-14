@extends('layouts.app')

@section('title', 'Setores')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Setores</h3>
    <div class="card shadow" style="width: 660px;">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <form method="get">
                            <div class="d-flex">
                                <div>
                                    <div class="input-group" style="width: 270px;">
                                    <input class="form-control form-control-sm" type="search" id="search" aria-controls="dataTable" placeholder="Buscar descrição" name="search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
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
                    <div class="text-end"><a class="btn btn-success" role="button" href="{{ route('sector.create') }}"><i class="fas fa-plus"></i><span>&nbsp;Novo</span></a></div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th>Situação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sectors as $sector)
                            <tr>
                                <td>{{ $sector->id }}</td>
                                <td>{{ $sector->description }}</td>
                                <td>{{ $sector->active == 1 ? 'Ativo' : 'Inativo' }}</td>
                                <td class="text-end align-middle">
                                    <a class="btn btn-outline-success border rounded-circle" role="button" style="border-radius: 30px;width: 40px;margin-right: 10px;" href="{{ route('sector.edit', $sector->id) }}">
                                        <i class="fas fa-pen" style="width: 14px;height: 16px;"></i>
                                    </a>
                                    <a class="btn btn-outline-danger border rounded-circle" role="button" style="border-radius: 30px;border-width: 1px;margin-right: 10px;" href="{{ route('sector.active', $sector->id) }}" onclick="return confirm('Deseja mesmo mudar a situação desse cadastro?');">
                                        <i class="fas fa-ban" style="width: 14px;height: 16px;"></i>
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
                {{ $sectors->appends('search', $_GET['search'] ?? '')->links() }}
            </div>
        </div>
    </div>
@endsection