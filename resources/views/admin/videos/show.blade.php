@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Video: {{ $video->titulo_v }}</h1>
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

          <div class="col-md-6">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Datos del Video</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped table-bordered">
                    <tbody>
                      <tr>
                        <th>Título</th>
                        <td>{{ $video->titulo_v }}</td>
                      </tr>
                      <tr>
                        <th>Descripción</th>
                        <td>{!! $video->descripcion_v !!}</td>
                      </tr>
                      <tr>
                        <th>Portada</th>
                        <td><img src="{{asset('storage').'/'.$video->imagen_v}}" width="200" alt=""></td>
                      </tr>
                      <tr>
                        <th>URL del Video</th>
                        <td>
                            <iframe width="100%" height="206" src="https://www.youtube.com/embed/{{ $video->video_url_v }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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