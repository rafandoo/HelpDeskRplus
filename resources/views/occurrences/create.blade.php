@extends('layouts.app')

@section('title', 'Incluir ocorrência')

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
    <h3 class="text-dark mb-4">Trâmites</h3>
    <div class="row mb-3">
        <div class="col-11 col-xl-12 col-xxl-11 offset-xl-0">
            <div class="row">
                <div class="col-xl-11 col-xxl-9">
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <form method="post" action="{{ route('occurrences.store') }}">
                                @csrf
                                @method('POST')
                                @include('occurrences.form')
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
    <script language="javascript" type="text/javascript">
        /* A function that gets the current time and puts it in the input field. */
        $('#btnFinalTime').click(function() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            if (hours < 10) {
                hours = '0' + hours;
            }
            if (minutes < 10) {
                minutes = '0' + minutes;
            }
            if (seconds < 10) {
                seconds = '0' + seconds;
            }

            $('#final_time').val(hours + ':' + minutes + ':' + seconds);
            $('#btnSave').removeAttr('disabled');
        });
    </script>
@endsection