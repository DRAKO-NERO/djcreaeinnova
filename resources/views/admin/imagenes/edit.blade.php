@extends ('layouts.admin')

@section('content')

<!-- Carga de CKEditor -->
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-12 col-sm-6 text-center text-sm-left">
            <h1 class="m-0 font-weight-bold text-dark fs-4">Editar Imagen</h1>
          </div><!-- /.col -->  
          <div class="col-12 col-sm-6 mt-2 mt-sm-0">
            <ol class="breadcrumb float-sm-right justify-content-center justify-content-sm-end">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/admin/imagenes') }}">Imágenes</a></li>
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
                  <i class="fas fa-edit mr-1"></i> Actualizar los Datos de la Imagen
                </h5>
              </div>

              <div class="card-body">
                <form action="{{ url('/admin/imagenes/'.$imagen->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="row g-3">
                        
                        <!-- Columna Izquierda: Título y Previsualización de Archivo -->
                        <div class="col-12 col-md-6">
                            
                            <div class="form-group mb-3">
                                <label for="titulo_i" class="font-weight-bold">Título de la Imagen <span class="text-danger">*</span></label>
                                <input type="text" name="titulo_i" id="titulo_i" class="form-control" value="{{ $imagen->titulo_i }}" required>
                                @error('titulo_i')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="file" class="font-weight-bold">Portada de la Imagen</label>
                                <input type="file" name="imagen_i" id="file" class="form-control-file border rounded p-1 w-100">
                                @error('imagen_i')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Previsualización adaptativa -->
                            <div class="form-group text-center">
                                <label class="text-muted d-block font-weight-normal mb-2">Vista previa de la imagen:</label>
                                <output id="list" class="d-inline-block border rounded p-1 bg-light shadow-sm mw-100">
                                    <img src="{{ \Illuminate\Support\Str::startsWith($imagen->imagen_i, 'http') ? $imagen->imagen_i : asset('storage/' . $imagen->imagen_i) }}" 
                                         alt="Portada de la Imagen" 
                                         class="img-fluid rounded" 
                                         style="max-height: 250px; object-fit: contain;">
                                </output>
                            </div>

                        </div>

                        <!-- Columna Derecha: Descripción (CKEditor) -->
                        <div class="col-12 col-md-6">
                            
                            <div class="form-group mb-3">
                                <label for="descripcion_i" class="font-weight-bold">Descripción de la Imagen <span class="text-danger">*</span></label>
                                <textarea name="descripcion_i" id="descripcion_i" cols="30" rows="6" class="form-control" required>{{ $imagen->descripcion_i }}</textarea>
                                @error('descripcion_i')
                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- Botones de Acción -->
                    <div class="row">
                        <div class="col-12 d-flex flex-wrap justify-content-end gap-2">
                            <a href="{{ url('/admin/imagenes') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times-circle mr-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-sync-alt mr-1"></i> Actualizar Imagen
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

    <!-- Scripts de previsualización y CKEditor -->
    <script>
        // Inicialización de CKEditor
        CKEDITOR.replace('descripcion_i', {
            versionCheck: false
        });

        // Función para previsualización dinámica
        function archivo(evt) {
            var files = evt.target.files; 
            for (var i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function (theFile) {
                    return function (e) {
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