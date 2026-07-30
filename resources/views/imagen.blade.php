<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <link rel="icon" href="{{asset('img/djcreaeinnova.jpg')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DJcreaeinnova - Muebles Personalizados</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <style>
        /* Asegura que cualquier elemento dentro de la descripción respete los bordes */
        .descripcion-contenido img, 
        .descripcion-contenido table,
        .descripcion-contenido iframe {
            max-width: 100% !important;
            height: auto !important;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <div style="width: 60px;">
      <a href="{{url('/')}}"><img src="{{asset('img/djcreaeinnova.jpg')}}" alt="Logo" width="40px"></a>
    </div>
    <a class="navbar-brand" href="{{url('/')}}">DJCREAEINNOVA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
  </div>
</nav>

<br>

<!-- Título Principal -->
<div class="container text-center px-2 my-3">
    <h1 class="titulo1 animate__animated animate__slideInDown mb-0">
        DJ CREA E INNOVA
    </h1>
</div>

<br>

<!-- Tarjeta Principal del Detalle de Imagen -->
<div class="container my-2" style="background-color: #00000083; border-radius: 10px; box-shadow: 0px 0px 10px #000000; padding: 15px;">
    <div class="card card-primary card-outline border-0 bg-white rounded-3">
        
        <!-- Título de la Imagen -->
        <div class="card-header bg-white border-bottom py-3">
            <h3 class="m-0 text-dark fw-bold text-center text-md-start fs-4 fs-md-3">{{$imagen->titulo_i}}</h3>
        </div>

        <div class="card-body p-3 p-md-4 text-start">
            <div class="row align-items-start g-4">
                
                <!-- Columna de la Imagen (Adaptable) -->
                <div class="col-12 col-md-5 col-lg-5 text-center">
                    <h5 class="fw-bold mb-3 text-uppercase text-primary">IMAGEN</h5>
                    <div class="shadow-sm rounded overflow-hidden mx-auto" style="max-width: 450px;">
                        <img src="{{ \Illuminate\Support\Str::startsWith($imagen->imagen_i, 'http') ? $imagen->imagen_i : asset('storage/' . $imagen->imagen_i) }}" 
                             alt="{{ $imagen->titulo_i }}" 
                             class="img-fluid w-100 rounded" 
                             style="max-height: 500px; object-fit: cover;">
                    </div>
                </div>

                <!-- Columna de la Descripción -->
                <div class="col-12 col-md-7 col-lg-7">
                    <h5 class="fw-bold mb-3 text-uppercase text-primary text-center text-md-start">DESCRIPCIÓN</h5>
                    <div class="descripcion-contenido p-1 p-md-2 text-break" style="font-size: 1.05rem; line-height: 1.6; color: #333;">
                        {!! $imagen->descripcion_i !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<br><br>

<!-- Botones de Redes Sociales Responsivos -->
<div class="container text-center mb-4">
    <div class="d-flex flex-wrap justify-content-center gap-2">
        <a href="https://www.facebook.com/profile.php?id=61568396361484" target="_blank" class="btn btn-primary btn-lg btn-facebook animate__animated animate__zoomInUp animate__delay-1s"><i class="bi bi-facebook"></i></a>
        <a href="https://youtube.com/@djcreaeinnova?si=hmKOT50TGAqDILxV" target="_blank" class="btn btn-danger btn-lg btn-youtube animate__animated animate__zoomInUp animate__delay-2s"><i class="bi bi-youtube"></i></a>
        <a href="https://www.tiktok.com/@mister.mueble.per?_r=1&_t=ZS-98RzkitaoIS" target="_blank" class="btn btn-lg btn-tiktok animate__animated animate__zoomInUp animate__delay-3s"><i class="bi bi-tiktok"></i></a>
        <a href="https://www.instagram.com/djcreaeinnova?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="btn btn-lg btn-instagram animate__animated animate__zoomInUp animate__delay-4s"><i class="bi bi-instagram"></i></a>
        <a href="https://wa.me/51915061691" target="_blank" class="btn btn-secondary btn-lg btn-whatsapp animate__animated animate__zoomInUp animate__delay-5s"><i class="bi bi-whatsapp"></i></a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>