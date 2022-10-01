@extends('layouts.app')

@section('title', 'Editar Setor')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Cadastro de setor</h3>
    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <form method="post" action="{{ route('sector.update', $sector->id) }}">
                                @csrf
                                @method('PUT')
                                @include('layouts.formDescAct', ['object' => $sector])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection