@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-12 col-sm-6 text-center text-sm-left">
            <h1 class="m-0 font-weight-bold text-dark fs-4">Detalle del Video</h1>
          </div><!-- /.col -->  
          <div class="col-12 col-sm-6 mt-2 mt-sm-0">
            <ol class="breadcrumb float-sm-right justify-content-center justify-content-sm-end">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></li>
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
                  <i class="fas fa-video mr-1"></i> {{ $video->titulo_v }}
                </h5>
                <div class="ml-auto">
                    <a href="{{ route('videos.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Volver
                    </a>
                    <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-success btn-sm">
                        <i class="fas fa-edit mr-1"></i> Editar
                    </a>
                </div>
              </div>

              <div class="card-body">
                <div class="row g-4">
                  
                  <!-- Columna Reproductor Video -->
                  <div class="col-12 col-md-6 text-center">
                    <label class="font-weight-bold text-muted d-block mb-2">Previsualización del Video</label>
                    <div class="embed-responsive embed-responsive-16by9 rounded shadow-sm overflow-hidden" style="min-height: 250px;">
                      <iframe class="embed-responsive-item w-100 h-100" 
                              src="https://www.youtube.com/embed/{{ $video->video_url_v }}" 
                              title="YouTube video player" 
                              frameborder="0" 
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                              allowfullscreen>
                      </iframe>
                    </div>
                  </div>

                  <!-- Columna Datos e Información -->
                  <div class="col-12 col-md-6">
                    
                    <!-- Portada de Miniatura -->
                    <div class="form-group mb-3 text-center text-md-left">
                      <label class="font-weight-bold text-muted d-block">Portada Registrada:</label>
                      <img src="{{ $video->imagen_v }}" 
                           class="img-thumbnail rounded shadow-sm" 
                           style="max-width: 140px; height: 90px; object-fit: cover;" 
                           alt="{{ $video->titulo_v }}">
                    </div>

                    <!-- Título -->
                    <div class="form-group mb-3">
                      <label class="font-weight-bold text-muted mb-0">Título del Video:</label>
                      <p class="fs-5 font-weight-bold text-dark mb-0">{{ $video->titulo_v }}</p>
                    </div>

                    <!-- Descripción -->
                    <div class="form-group mb-0">
                      <label class="font-weight-bold text-muted mb-1">Descripción:</label>
                      <div class="p-3 bg-light rounded border text-break" style="max-height: 200px; overflow-y: auto;">
                        {!! $video->descripcion_v !!}
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