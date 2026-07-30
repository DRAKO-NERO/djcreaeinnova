@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Tu cuenta fue Creada!') }} <br>
                    <a href="{{ url('/admin') }}" class="btn btn-primary">Panel de Control</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
