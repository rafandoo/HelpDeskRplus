@extends('layouts.app')

@section('title', 'Home')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/summernote-bs5.min.css') }}">
@endsection

@section('content')
    <h3 class="text-dark mb-4">Ticket</h3>
    <div class="row mb-3">
        <div class="col-11 col-xl-12 col-xxl-11 offset-xl-0">
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <div class="row d-flex">
                                <div class="w-100"></div>
                                <div class="col d-xxl-flex align-items-xxl-center">
                                    <p class="fs-5 text-primary m-0 fw-bold">Informações do chamado</p>
                                </div>
                                <div class="col text-end">
                                    <!--onclick="validaTicket('listaTramites.php?idTicket=')"-->
                                    <a class="btn btn-primary" role="button" style="margin-right: 10px;">Ordem de Serviço</a>
                                    <a class="btn btn-primary" role="button">Trâmites</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <form method="post" action="{{ route('ticket.update', $ticket->id) }}">
                                @csrf
                                @method('PUT')
                                @include('ticket.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/summernote-bs5.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote.js') }}"></script>
    <script src="{{ asset('assets/js/searchClients.js') }}"></script>
    <script src="{{ asset('assets/js/searchUsers.js') }}"></script>
@endsection