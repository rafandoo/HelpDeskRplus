@extends('layouts.app')

@section('title', 'Incluir Categoria')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Cadastro de categorias</h3>
    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <form method="post" action="{{ route('category.store') }}">
                                @csrf
                                @method('POST')
                                @include('layouts.formDescAct')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection