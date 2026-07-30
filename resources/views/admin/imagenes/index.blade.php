@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Imagenes</h1>
          </div><!-- /.col -->  
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

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

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Imagenes</h5>
                @if ($message=Session::get('mensaje'))
                  <script>
                    Swal.fire(
                        '¡Éxito!',
                        '{{ $message }}',
                        'success'
                      )
                  </script>
                @endif
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Nro</th>
                      <th>titulo</th>
                      <th>descripcion</th>
                      <th>imagen</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $contador = 0; ?>
                    @foreach ($imagenes as $imagen)
                      <tr>
                        <td><?php echo $contador = $contador +1; ?></td>
                        <td>{{ $imagen->titulo_i }}</td>
                        <td>{!! $imagen->descripcion_i !!}</td>
                        <td>
                          <!-- CAMBIO AQUÍ: Se usa la URL directa guardada de Cloudinary -->
                          <img src="{{ $imagen->imagen_i }}" width="100" class="img-thumbnail" alt="{{ $imagen->titulo_i }}">
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('imagenes.show', $imagen->id) }}" class="btn btn-info btn-sm">Mostrar</a>
                            <a href="{{ route('imagenes.edit', $imagen->id) }}" class="btn btn-success btn-sm">Editar</a>
                            <form action="{{ url('admin/imagenes', $imagen->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta imagen?')" class="btn btn-danger btn-sm" value="Borrar">
                            </form>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection