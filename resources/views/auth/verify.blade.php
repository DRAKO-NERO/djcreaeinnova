@extends('layouts.app')

@section('content')
<style>
    body {
        background: url("https://cdn.pixabay.com/photo/2020/10/18/09/16/bedroom-5664221_1280.jpg");
        background-repeat: no-repeat;
        background-size: 100vw 100vh;
        z-index: -3;
        background-attachment: fixed;
    }
    .fondo-personalizado {
        background-color: #00000054; 
        padding: 40px 0;
        border-radius: 8px;
    }
</style>

<div class="container fondo-personalizado">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu Correo Electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a tu correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor revisa tu correo electrónico para el enlace de verificación.') }}
                    {{ __('Si no recibiste el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('haz clic aquí para solicitar otro') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection