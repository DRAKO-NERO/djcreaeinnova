@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-12 col-sm-6 text-center text-sm-left">
            <h1 class="m-0 font-weight-bold text-dark fs-4">Detalle de la Imagen</h1>
          </div><!-- /.col -->  
          <div class="col-12 col-sm-6 mt-2 mt-sm-0">
            <ol class="breadcrumb float-sm-right justify-content-center justify-content-sm-end">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('imagenes.index') }}">Imágenes</a></li>
              <li class="breadcrumb-item active">Ver Detalle</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-12 col-lg-10 mx-auto">

            <div class="card card-primary card-outline shadow-sm">
              <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h5 class="m-0 font-weight-bold text-primary">
                  <i class="fas fa-image mr-1"></i> {{ $imagen->titulo_i }}
                </h5>
                <div class="ml-auto">
                    <a href="{{ route('imagenes.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a>
                    <a href="{{ route('imagenes.edit', $imagen->id) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                </div>
              </div>

              <div class="card-body">
                <div class="row align-items-center g-4">
                  
                  <!-- Columna Vista Previa de la Imagen -->
                  <div class="col-12 col-md-5 text-center mb-3 mb-md-0">
                    <label class="font-weight-bold text-muted d-block mb-2">Previsualización</label>
                    <div class="shadow-sm p-2 bg-light rounded overflow-hidden mx-auto" style="max-width: 350px;">
                      <a href="{{ $imagen->imagen_i }}" target="_blank" title="Haz clic para ampliar">
                        <img src="{{ $imagen->imagen_i }}" 
                             class="img-fluid rounded" 
                             style="max-height: 350px; width: 100%; object-fit: contain;" 
                             alt="{{ $imagen->titulo_i }}">
                      </a>
                    </div>
                    <small class="text-muted mt-1 d-block"><i class="fas fa-search-plus"></i> Clic para ver a tamaño completo</small>
                  </div>

                  <!-- Columna Datos e Información -->
                  <div class="col-12 col-md-7">
                    
                    <!-- Título -->
                    <div class="form-group mb-3">
                      <label class="font-weight-bold text-muted mb-0">Título:</label>
                      <p class="fs-5 font-weight-bold text-dark mb-0">{{ $imagen->titulo_i }}</p>
                    </div>

                    <hr class="my-3">

                    <!-- Descripción -->
                    <div class="form-group mb-0">
                      <label class="font-weight-bold text-muted mb-1">Descripción:</label>
                      <div class="p-3 bg-light rounded border text-break" style="max-height: 250px; overflow-y: auto;">
                        {!! $imagen->descripcion_i !!}
                      </div>
                    </div>

                  </div>

                </div><!-- /.row -->
              </div><!-- /.card-body -->
              
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection