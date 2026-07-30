@extends ('layouts.admin')

@section('content')

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Editar Imagen: {{$imagen->titulo_i}} </h1>
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

            <div class="card card-success card-outline">
            <div class="card-header">
                <h5 class="m-0">Actualizar los Datos de la Imagen</h5>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/imagenes/'.$imagen->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Titulo de la Imagen<span style="color: red"><b>*</b></span></label>
                                <input type="text" name="titulo_i" class="form-control" value="{{$imagen->titulo_i}}" required>
                                @error('titulo_i')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                <label for="">Portada de la Imagen<span style="color: red"><b>*</b></span></label>
                                <input type="file" name="imagen_i" id="file" class="form-control" value="{{$imagen->imagen_i}}">
                                @error('imagen_i')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                <br>
                                <center><output id="list" style="margin-top: 0px;">
                                    <img src="{{ asset('storage').'/'.$imagen->imagen_i}}" alt="Portada de la Imagen" width="400px">
                                </output></center>
                                <script>
                                                function archivo(evt) {
                                                    var files = evt.target.files; // FileList object
                                                    // Obtenemos la imagen del campo "file".
                                                    for (var i = 0, f; f = files[i]; i++) {
                                                        //Solo admitimos imágenes.
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
                                <label for="">Descripcion de la Imagen<span style="color: red"><b>*</b></span></label>
                                <textarea name="descripcion_i" id="descripcion_i" cols="30" rows="5" class="form-control" required>{{$imagen->descripcion_i}}</textarea>
                                @error('descripcion_i')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror

                                <script>
                                CKEDITOR.replace( 'descripcion_i', {
                                versionCheck: false
                        });
                                </script>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <a href="{{ url('/admin/imagenes') }}" class="btn btn-secondary">cancelar</a>
                            <input type="submit" value="Actualizar" class="btn btn-success">
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