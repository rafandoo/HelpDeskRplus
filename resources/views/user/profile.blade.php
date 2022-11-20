@extends('layouts.app')

@section('title', 'Perfil')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Perfil</h3>
    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body text-center shadow">
                    @if ($user->picture)
                        <img class="rounded-circle mb-3 mt-4" src="{{ asset('image/' . $user->picture) }}" width="160" height="160" style="object-fit: cover;">
                    @else
                        <img class="rounded-circle mb-3 mt-4" src="{{ asset('assets/img/avatars/avatar.jpeg') }}" width="160" height="160" style="object-fit: cover;">
                    @endif
                    <form action="{{ route('user.updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="file" name="picture" id="picture" class="form-control-file" hidden>
                        <label for="picture" class="btn btn-primary btn-sm" type="button">Escolher foto</label>
                        <button class="btn btn-primary btn-sm" type="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Dados do perfil</p>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.updateProfile', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                        <div class="mb-3">
                                            <label class="form-label" for="username"><strong>Usuário</strong></label>
                                            <div class="input-group">
                                                <span class="input-group-text">@</span>
                                                <input class="form-control" type="text" id="username" placeholder="user.name" name="username" required minlength="3" value="{{ $user->username }}" onchange="validateLogin(this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email"><strong>E-mail</strong></label>
                                            <input class="form-control" type="email" id="email" placeholder="user@example.com" name="email" required value="{{ $user->email }}" onchange="validateEmail(this)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="name"><strong>Nome</strong></label>
                                            <input class="form-control" type="text" id="name" placeholder="John" name="name" required minlength="2" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="last_name"><strong>Sobrenome</strong><br></label>
                                            <input class="form-control" type="text" id="last_name" placeholder="Doe" name="last_name" required value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="password"><strong>Senha</strong><br></label>
                                            @if (isset($user))
                                                <input class="form-control" type="password" id="password" name="password" placeholder="********" minlenght="8" onchange="validatePassword(this)">
                                            @else
                                                <input class="form-control" type="password" id="password" name="password" placeholder="********" minlenght="8" onchange="validatePassword(this)" required>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="confirm_password"><strong>Confirmar senha</strong><br></label>
                                            @if (isset($user))
                                                <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="********" minlenght="8" onchange="confirmPassword(this)">
                                            @else
                                                <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="********" minlenght="8" onchange="confirmPassword(this)" required>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary" type="submit">Salvar</button></div>
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