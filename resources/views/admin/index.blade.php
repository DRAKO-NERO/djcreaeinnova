@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bienvenido {{ Auth::user()->name }}</h1>
          </div><!-- /.col -->  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- Breadcrumb opcional -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
        <b>Panel de Control - DJ Crea e Innova</b>
        <br><br>

<div class="row">
          
  <!-- TARJETA 1: VIDEOS -->
  <div class="col-lg-4 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <!-- Aquí imprimimos la variable que mandamos desde web.php -->
        <h3>{{ $total_videos }}</h3>
        <p>Videos Registrados</p>
      </div>
      <div class="icon">
        <i class="fas fa-video"></i>
      </div>
      <a href="{{ url('/admin/videos') }}" class="small-box-footer">
        Ingresar <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <!-- TARJETA 2: IMÁGENES -->
  <div class="col-lg-4 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <!-- Contador de imágenes -->
        <h3>{{ $total_imagenes }}</h3>
        <p>Imágenes Registradas</p>
      </div>
      <div class="icon">
        <i class="fas fa-image"></i>
      </div>
      <a href="{{ url('/admin/imagenes') }}" class="small-box-footer">
        Ingresar <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <!-- TARJETA 3: REGISTRO DE USUARIOS -->
  <div class="col-lg-4 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <!-- Contador de usuarios -->
        <h3>{{ $total_usuarios }}</h3>
        <p>Usuarios Registrados</p>
      </div>
      <div class="icon">
        <i class="fas fa-user-plus"></i>
      </div>
      <a href="{{ url('/admin/usuarios/create') }}" class="small-box-footer">
        Registrar nuevo <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection