@extends ('layouts.admin')

@section('content')

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Nuevo Video</h1>
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
                <h5 class="m-0">Registre los Datos del Video</h5>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/videos')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Titulo del Video<span style="color: red"><b>*</b></span></label>
                                <input type="text" name="titulo_v" class="form-control" value="{{old('titulo_v')}}" placeholder="Ingrese el titulo del video" required>
                                @error('titulo_v')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                <label for="">Portada del Video<span style="color: red"><b>*</b></span></label>
                                <input type="file" name="imagen_v" id="file" class="form-control" placeholder="Ingrese la ruta de la imagen del video" required>
                                @error('imagen_v')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                <br>
                                <center><output id="list" style="margin-top: 0px;"></output></center>
                                <script>
                                    function archivo(evt) {
                                        var files = evt.target.files; // FileList object
                                        // Obtenemos la imagen del campo "file".
                                        for (var i = 0, f; f = files[i]; i++) {
                                            // Solo admitimos imágenes.
                                            if (!f.type.match('image.*')) {
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function (theFile) {
                                                return function (e) {
                                                    // Insertamos la imagen
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="400px" title="', escape(theFile.name), '"/>'].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);
                                        }
                                    }
                                    document.getElementById('file').addEventListener('change', archivo, false);
                                </script>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">URL del Video<span style="color: red"><b>*</b></span></label>
                                <input type="text" name="video_url_v" class="form-control" value="{{old('video_url_v')}}" placeholder="Ingrese la ruta del video" required>
                                
                                @error('video_url_v')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                <label for="">Descripcion del Video<span style="color: red"><b>*</b></span></label>
                                <textarea name="descripcion_v" id="descripcion_v" cols="30" rows="5" class="form-control" required>{{old('descripcion_v')}}</textarea>
                                @error('descripcion_v')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                <script>
                                CKEDITOR.replace( 'descripcion_v', {
                                    versionCheck: false
                                });
                                </script>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('/admin/videos') }}" class="btn btn-secondary">cancelar</a>
                            <input type="submit" value="Registrar" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection