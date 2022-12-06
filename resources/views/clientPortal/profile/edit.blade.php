@extends('clientPortal.layouts.app')

@section('title', 'Home')

@section('sideNav')
    @include('clientPortal.layouts.sidebar')
@endsection

@section('topNav')
    @include('clientPortal.layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Perfil</h3>
    <div class="row mb-3">
        <div class="col-lg-4" hidden>
            <div class="card mb-3">
                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="../assets/img/dogs/image2.jpeg" width="160" height="160">
                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Mudar foto</button></div>
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
                            <form method="post">
                                @csrf
                                @method('PUT')
                                <!-- ainda falta ajustar as rotas/controller -->
                                <!-- e as validações -->
                                <div class="row">
                                    <input type="hidden" name="idUsuario" value="{{ $user->id }}">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="login"><strong>Usuário</strong></label>
                                            <div class="input-group">
                                                <span class="input-group-text">@</span>
                                                <input class="form-control" type="text" id="login" name="login" required minlength="3" value="{{ $user->login }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email"><strong>E-mail</strong></label>
                                            <input class="form-control" type="email" id="email" name="email" required value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="name"><strong>Nome</strong></label>
                                            <input class="form-control" type="text" id="name" name="name" required minlength="2" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="password"><strong>Senha</strong><br></label>
                                            <input class="form-control" type="password" id="password" name="password" minlength="8">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="confirm_password"><strong>Confirmar senha</strong><br></label>
                                            <input class="form-control" type="password" id="confirm_password" name="confirm_password" minlength="8"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Salvar</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection