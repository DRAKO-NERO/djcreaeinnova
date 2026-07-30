@extends ('layouts.admin')

@section('content')

<!-- Carga de CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-12 col-sm-6 text-center text-sm-left">
            <h1 class="m-0 font-weight-bold text-dark fs-4">Editar Video</h1>
          </div><!-- /.col -->  
          <div class="col-12 col-sm-6 mt-2 mt-sm-0">
            <ol class="breadcrumb float-sm-right justify-content-center justify-content-sm-end">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/admin/videos') }}">Videos</a></li>
              <li class="breadcrumb-item active">Editar</li>
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

            <div class="card card-success card-outline shadow-sm">
              <div class="card-header">
                <h5 class="m-0 font-weight-bold text-success">
                  <i class="fas fa-edit mr-1"></i> Actualizar los Datos del Video
                </h5>
              </div>

              <div class="card-body">
                <form action="{{ url('/admin/videos/'.$video->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="row g-3">
                        
                        <!-- Columna Izquierda: Título e Imagen -->
                        <div class="col-12 col-md-6">
                            
                            <div class="form-group mb-3">
                                <label for="titulo_v" class="font-weight-bold">Título del Video <span class="text-danger">*</span></label>
                                <input type="text" name="titulo_v" id="titulo_v" class="form-control" value="{{ $video->titulo_v }}" required>
                                @error('titulo_v')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="file" class="font-weight-bold">Portada del Video <span class="text-danger">*</span></label>
                                <input type="file" name="imagen_v" id="file" class="form-control-file border rounded p-1 w-100">
                                @error('imagen_v')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Previsualización de la portada adaptativa -->
                            <div class="form-group text-center">
                                <label class="text-muted d-block font-weight-normal mb-2">Vista previa de la portada:</label>
                                <output id="list" class="d-inline-block border rounded p-1 bg-light shadow-sm mw-100">
                                    <img src="{{ \Illuminate\Support\Str::startsWith($video->imagen_v, 'http') ? $video->imagen_v : asset('storage/' . $video->imagen_v) }}" 
                                         alt="Portada del Video" 
                                         class="img-fluid rounded" 
                                         style="max-height: 250px; object-fit: contain;">
                                </output>
                            </div>

                        </div>

                        <!-- Columna Derecha: URL y Descripción -->
                        <div class="col-12 col-md-6">
                            
                            <div class="form-group mb-3">
                                <label for="video_url_v" class="font-weight-bold">ID / URL del Video (YouTube) <span class="text-danger">*</span></label>
                                <input type="text" name="video_url_v" id="video_url_v" class="form-control" value="{{ $video->video_url_v }}" required>
                                @error('video_url_v')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="descripcion_v" class="font-weight-bold">Descripción del Video <span class="text-danger">*</span></label>
                                <textarea name="descripcion_v" id="descripcion_v" cols="30" rows="5" class="form-control" required>{{ $video->descripcion_v }}</textarea>
                                @error('descripcion_v')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- Botones de Acción -->
                    <div class="row">
                        <div class="col-12 d-flex flex-wrap justify-content-end gap-2">
                            <a href="{{ url('/admin/videos') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times-circle mr-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-sync-alt mr-1"></i> Actualizar Video
                            </button>
                        </div>
                    </div>

                </form>
              </div><!-- /.card-body -->
            </div>

          </div>
          <!-- /.col-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- Script de previsualización y CKEditor -->
    <script>
        // Inicializar CKEditor
        CKEDITOR.replace('descripcion_v', {
            versionCheck: false
        });

        // Función para previsualizar imagen seleccionada
        function archivo(evt) {
            var files = evt.target.files; 
            for (var i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function (theFile) {
                    return function (e) {
                        // Cambiamos 'width="400px"' por clases CSS fluidas
                        document.getElementById("list").innerHTML = [
                            '<img class="img-fluid rounded" style="max-height: 250px; object-fit: contain;" src="', e.target.result, 
                            '" title="', escape(theFile.name), '"/>'
                        ].join('');
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }
        document.getElementById('file').addEventListener('change', archivo, false);
    </script>

@endsection