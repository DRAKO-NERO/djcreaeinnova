@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-12 col-sm-6 text-center text-sm-left">
            <h1 class="m-0 font-weight-bold text-dark fs-4">Gestión de Videos</h1>
          </div><!-- /.col -->  
          <div class="col-12 col-sm-6 mt-2 mt-sm-0">
            <ol class="breadcrumb float-sm-right justify-content-center justify-content-sm-end">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Videos</li>
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

          <div class="col-md-12">

            <div class="card card-primary card-outline shadow-sm">
              <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h5 class="m-0 font-weight-bold text-primary">Lista de Videos</h5>
                <a href="{{ route('videos.create') }}" class="btn btn-primary btn-sm ml-auto">
                    <i class="fas fa-plus-circle mr-1"></i> Agregar Video
                </a>

                @if ($message = Session::get('mensaje'))
                  <script>
                    Swal.fire(
                        '¡Éxito!',
                        '{{ $message }}',
                        'success'
                    )
                  </script>
                @endif
              </div>

              <div class="card-body p-0 p-md-3">
                <!-- Envoltorio mágico para hacer tablas responsivas en Bootstrap/AdminLTE -->
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped mb-0 align-middle">
                    <thead class="thead-dark text-nowrap">
                      <tr>
                        <th style="width: 50px;">N°</th>
                        <th>Título</th>
                        <th style="min-width: 200px;">Descripción</th>
                        <th style="width: 100px;">Imagen</th>
                        <th>URL</th>
                        <th style="width: 150px;" class="text-center">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($videos as $video)
                        <tr>
                          <!-- $loop->iteration reemplaza tu $contador de PHP nativo -->
                          <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                          
                          <td class="font-weight-bold text-nowrap">{{ $video->titulo_v }}</td>
                          
                          <td>
                            <!-- Limita la descripción para que no ocupe filas gigantescas -->
                            <div style="max-height: 80px; overflow-y: auto; font-size: 0.9rem;">
                              {!! $video->descripcion_v !!}
                            </div>
                          </td>
                          
                          <td class="text-center">
                            <img src="{{ $video->imagen_v }}" 
                                 class="img-thumbnail rounded" 
                                 style="max-width: 80px; height: 50px; object-fit: cover;" 
                                 alt="{{ $video->titulo_v }}">
                          </td>
                          
                          <td class="text-nowrap">
                            <a href="https://www.youtube.com/shorts/{{ $video->video_url_v }}" 
                               target="_blank" 
                               class="btn btn-outline-danger btn-sm">
                              <i class="fab fa-youtube mr-1"></i> Ver
                            </a>
                          </td>
                          
                          <td class="text-center">
                            <div class="btn-group gap-1" role="group" aria-label="Acciones">
                              <!-- Botón Mostrar -->
                              <a href="{{ route('videos.show', $video->id) }}" 
                                 class="btn btn-info btn-sm" 
                                 title="Ver Detalle">
                                <i class="fas fa-eye"></i>
                              </a>

                              <!-- Botón Editar -->
                              <a href="{{ route('videos.edit', $video->id) }}" 
                                 class="btn btn-success btn-sm" 
                                 title="Editar">
                                <i class="fas fa-edit"></i>
                              </a>

                              <!-- Botón Borrar -->
                              <form action="{{ url('admin/videos', $video->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  {{ method_field('DELETE') }}
                                  <button type="submit" 
                                          onclick="return confirm('¿Estás seguro de que deseas eliminar este video?')" 
                                          class="btn btn-danger btn-sm" 
                                          title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                              </form>
                            </div>
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="6" class="text-center py-4 text-muted">
                            <i class="fas fa-video-slash fa-2x mb-2 d-block"></i>
                            No hay videos registrados aún.
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div><!-- /.table-responsive -->
              </div><!-- /.card-body -->
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection