@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Cadastro de cliente</h3>
    <div class="row mb-3">
        <div class="col-11">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="fs-4 text-primary m-0 fw-bold">Dados do cliente</p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('client.update', $client->id) }}">
                                @csrf
                                @method('PUT')
                                @include('client.form', ['client' => $client])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/searchCities.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
@endsection