@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Cadastro de categoria</h3>
    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <form method="post" action="{{ route('category.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                                @include('layouts.formDescAct', ['object' => $category])
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection