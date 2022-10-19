@extends('layouts.app')

@section('title', 'Ticket - Tramites')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Lista de trâmites</h3>
    <div class="card shadow">
        <div class="card-body" style="font-size: 14px;">
            <div class="row">
                <div class="col-xl-2 col-xxl-2" style="padding-right: 0px;padding-left: 0px;">
                    <div>
                        <div style="margin-bottom: 15px;">
                            <div class="input-group">
                                <span class="input-group-text">Ticket #</span>
                                <input class="bg-white form-control" type="text" id="id" name="id" readonly style="margin-right: 10px;" value="{{ $ticket->id }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3" style="padding-right: 0px;padding-left: 0px;">
                    <div>
                        <div style="margin-bottom: 15px;">
                            <div class="input-group">
                                <span class="input-group-text">Total horas</span>
                                <input class="bg-white form-control" id="amount_hours" name="amount_hours" readonly style="margin-right: 10px;" type="time">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4" style="padding-right: 0px;padding-left: 0px;">
                    <div>
                        <div style="margin-bottom: 15px;">
                            <div class="input-group">
                                <span class="input-group-text">Cliente</span>
                                <input class="bg-white form-control" type="text" id="client" name="client" readonly value="{{ $ticket->client->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 offset-xl-0 offset-xxl-0 d-flex justify-content-xl-end align-items-xl-start">
                    <div>
                        <a class="btn btn-success" role="button" href="{{ route('occurrences.create', $ticket->id) }}" style="margin-right: 10px;">
                            <i class="fas fa-plus"></i>
                            <span>&nbsp;Novo</span>
                        </a>
                        <a class="btn btn-secondary" role="button" href="{{ route('ticket.edit', $ticket->id) }}">
                            <i class="fas fa-arrow-circle-left"></i>
                            <span>&nbsp;Voltar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body" style="font-size: 14px;">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table table-striped my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Hora inicial</th>
                            <th>Hora final</th>
                            <th>Descrição</th>
                            <th>Técnico</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($occurrences as $occurrence)
                        <tr class="align-middle">
                            <td class="text-nowrap">{{ $occurrence->id }}</td>
                            <td class="text-nowrap">{{ $occurrence->created_at }}</td>
                            <td class="text-nowrap">{{ $occurrence->initial_time }}</td>
                            <td class="text-nowrap">{{ $occurrence->final_time }}</td>
                            <td class="text-nowrap">@php echo $occurrence->description @endphp</td>
                            <td class="text-nowrap">{{ $occurrence->user->name }}</td>
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
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.4.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/amountHours.js') }}"></script>
@endpush