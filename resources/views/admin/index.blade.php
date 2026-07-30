@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-12 col-sm-6 text-center text-sm-left">
            <h1 class="m-0 font-weight-bold text-dark fs-4 fs-sm-2">
              Bienvenido, {{ Auth::user()->name }}
            </h1>
          </div><!-- /.col -->  
          <div class="col-12 col-sm-6 mt-2 mt-sm-0">
            <ol class="breadcrumb float-sm-right justify-content-center justify-content-sm-end">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <div class="mb-3">
          <h5 class="font-weight-bold text-secondary">
            <i class="fas fa-tachometer-alt mr-2"></i>Panel de Control - DJ Crea e Innova
          </h5>
        </div>

        <div class="row">
                  
          <!-- TARJETA 1: VIDEOS -->
          <div class="col-12 col-sm-6 col-lg-4 mb-3">
            <div class="small-box bg-info shadow-sm h-100">
              <div class="inner">
                <h3>{{ $total_videos }}</h3>
                <p class="font-weight-bold">Videos Registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-video"></i>
              </div>
              <a href="{{ url('/admin/videos') }}" class="small-box-footer">
                Ingresar <i class="fas fa-arrow-circle-right ml-1"></i>
              </a>
            </div>
          </div>

          <!-- TARJETA 2: IMÁGENES -->
          <div class="col-12 col-sm-6 col-lg-4 mb-3">
            <div class="small-box bg-success shadow-sm h-100">
              <div class="inner">
                <h3>{{ $total_imagenes }}</h3>
                <p class="font-weight-bold">Imágenes Registradas</p>
              </div>
              <div class="icon">
                <i class="fas fa-image"></i>
              </div>
              <a href="{{ url('/admin/imagenes') }}" class="small-box-footer">
                Ingresar <i class="fas fa-arrow-circle-right ml-1"></i>
              </a>
            </div>
          </div>

          <!-- TARJETA 3: REGISTRO DE USUARIOS -->
          <div class="col-12 col-sm-6 col-lg-4 mb-3">
            <div class="small-box bg-warning shadow-sm h-100">
              <div class="inner">
                <h3 class="text-white">{{ $total_usuarios }}</h3>
                <p class="text-white font-weight-bold">Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ url('/admin/usuarios/create') }}" class="small-box-footer style-warning">
                Registrar nuevo <i class="fas fa-arrow-circle-right ml-1"></i>
              </a>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection