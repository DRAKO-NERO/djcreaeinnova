@extends ('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Imagen: {{ $imagen->titulo_i }}</h1>
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
                <h5 class="m-0">Datos de la Imagen</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-striped table-bordered">
                    <tbody>
                      <tr>
                        <th>Título</th>
                        <td>{{ $imagen->titulo_i }}</td>
                      </tr>
                      <tr>
                        <th>Descripción</th>
                        <td>{!! $imagen->descripcion_i !!}</td>
                      </tr>
                      <tr>
                        <th>Portada</th>
                        <td><img src="{{asset('storage').'/'.$imagen->imagen_i}}" width="200" alt=""></td>
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