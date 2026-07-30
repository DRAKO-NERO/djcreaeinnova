@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-12 col-sm-6 text-center text-sm-left">
            <h1 class="m-0 font-weight-bold text-dark fs-4">Gestión de Imágenes</h1>
          </div><!-- /.col -->  
          <div class="col-12 col-sm-6 mt-2 mt-sm-0">
            <ol class="breadcrumb float-sm-right justify-content-center justify-content-sm-end">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Imágenes</li>
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
                <h5 class="m-0 font-weight-bold text-primary">Lista de Imágenes</h5>
                <a href="{{ route('imagenes.create') }}" class="btn btn-primary btn-sm ml-auto">
                    <i class="fas fa-plus-circle mr-1"></i> Agregar Imagen
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
                <!-- Envoltorio para tabla fluida en dispositivos móviles -->
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped mb-0 align-middle">
                    <thead class="thead-dark text-nowrap">
                      <tr>
                        <th style="width: 50px;">N°</th>
                        <th>Título</th>
                        <th style="min-width: 200px;">Descripción</th>
                        <th style="width: 120px;" class="text-center">Imagen</th>
                        <th style="width: 150px;" class="text-center">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($imagenes as $imagen)
                        <tr>
                          <!-- Uso de $loop->iteration en lugar de PHP nativo -->
                          <td class="text-center font-weight-bold">{{ $loop->iteration }}</td>
                          
                          <td class="font-weight-bold text-nowrap">{{ $imagen->titulo_i }}</td>
                          
                          <td>
                            <!-- Limita la descripción para evitar celdas demasiado altas -->
                            <div style="max-height: 80px; overflow-y: auto; font-size: 0.9rem;">
                              {!! $imagen->descripcion_i !!}
                            </div>
                          </td>
                          
                          <td class="text-center">
                            <img src="{{ $imagen->imagen_i }}" 
                                 class="img-thumbnail rounded" 
                                 style="max-width: 80px; height: 50px; object-fit: cover;" 
                                 alt="{{ $imagen->titulo_i }}">
                          </td>
                          
                          <td class="text-center">
                            <div class="btn-group gap-1" role="group" aria-label="Acciones">
                              <!-- Botón Mostrar -->
                              <a href="{{ route('imagenes.show', $imagen->id) }}" 
                                 class="btn btn-info btn-sm" 
                                 title="Ver Detalle">
                                <i class="fas fa-eye"></i>
                              </a>

                              <!-- Botón Editar -->
                              <a href="{{ route('imagenes.edit', $imagen->id) }}" 
                                 class="btn btn-success btn-sm" 
                                 title="Editar">
                                <i class="fas fa-edit"></i>
                              </a>

                              <!-- Botón Borrar -->
                              <form action="{{ url('admin/imagenes', $imagen->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  {{ method_field('DELETE') }}
                                  <button type="submit" 
                                          onclick="return confirm('¿Estás seguro de que deseas eliminar esta imagen?')" 
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
                          <td colspan="5" class="text-center py-4 text-muted">
                            <i class="fas fa-image fa-2x mb-2 d-block"></i>
                            No hay imágenes registradas aún.
                          </td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div><!-- /.table-responsive -->
              </div><!-- /.card-body -->
            </div>

          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection