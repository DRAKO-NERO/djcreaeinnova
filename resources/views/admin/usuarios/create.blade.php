@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Registrar Nuevo Usuario</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Usuario</h3>
                    </div>
                    
                    <!-- AQUÍ ESTÁ EL CAMBIO CLAVE EN LA RUTA -->
                    <form method="POST" action="{{ url('/admin/usuarios') }}">
                        @csrf
                        <div class="card-body">
                            
                            <!-- Campo Nombre -->
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" name="name" id="name" required placeholder="Ingresar nombre completo">
                            </div>

                            <!-- Campo Correo -->
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email" id="email" required placeholder="Ingresar correo">
                            </div>

                            <!-- Campo Contraseña -->
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" required placeholder="Mínimo 8 caracteres">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Registrar Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection