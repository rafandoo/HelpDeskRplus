@extends('layouts.app')

@section('title', 'Incluir Usuário')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Cadastro de usuário</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="{{ asset('assets/img/avatars/avatar.jpeg') }}" width="160" height="160" style="object-fit: cover;">
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="fs-4 text-primary m-0 fw-bold">Dados do perfil</p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.store') }}">
                                @csrf
                                @method('POST')
                                @include('user.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/validation.js') }}"></script>
@endpush