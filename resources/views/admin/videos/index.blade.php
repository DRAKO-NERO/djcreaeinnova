@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Videos</h1>
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
                <h5 class="m-0">Videos</h5>
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
              </div>
              <div class="card-body">
                <table class="table table-bodered border-hover table-striped">
                  <thead>
                    <tr>
                      <th>Nro</th>
                      <th>titulo</th>
                      <th>descripcion</th>
                      <th>imagen</th>
                      <th>url</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $contador = 0; ?>
                    @foreach ($videos as $video)
                      <tr>
                        <td><?php echo $contador = $contador +1; ?></td>
                        <td>{{ $video->titulo_v }}</td>
                        <td>{!! $video->descripcion_v !!}</td>
                        <td>
                          <img src="{{asset('storage').'/'.$video->imagen_v}}" width="100" alt="">
                        </td>
                        <td><a href="https://www.youtube.com/shorts/{{ $video->video_url_v }}" target="_blank">Ver Video</a></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ route('videos.show', $video->id) }}" class="btn btn-info btn-sm">Mostrar</a>
                          <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-success btn-sm">Editar</a>
                          <form action="{{ url('admin/videos', $video->id) }}" method="POST">
                              @csrf
                              {{ method_field('DELETE') }}
                              <input type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este video?')" class="btn btn-danger btn-sm" value="Borrar">
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

  @endsection