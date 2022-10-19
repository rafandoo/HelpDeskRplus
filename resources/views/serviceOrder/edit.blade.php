@extends('layouts.app')

@section('title', 'Ordem de Serviço')

@section('sideNav')
    @include('layouts.sidebar')
@endsection

@section('topNav')
    @include('layouts.navbar')
@endsection

@section('content')
    <h3 class="text-dark mb-4">Ordem de serviço</h3>
    <div class="row mb-3">
        <div class="col-11 col-xl-12 col-xxl-11 offset-xl-0">
            <div class="row">
                <div class="col-xl-11 col-xxl-7">
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <form action="{{ route('serviceOrder.update', $serviceOrder->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                @include('serviceOrder.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.4.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/amountHours.js') }}"></script>
@endpush