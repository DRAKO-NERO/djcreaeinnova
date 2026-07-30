<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <link rel="icon" href="{{asset('img/djcreaeinnova.jpg')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>DJcreaeinnova - muebles personalizados</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <div style="width: 60px;">
      <a href="{{url('/')}}"><img src="{{asset('img/djcreaeinnova.jpg')}}" alt="" width="40px"></a>
    </div>
    <a class="navbar-brand" href="{{url('/')}}">DJCREAEINNOVA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
  </div>
</nav>

<br>
<!-- Título principal fuera del marco para mantener la estética original -->
<center>
    <h3 class="titulo1">DJ CREA E INNOVA</h3>
</center>
<br>

<div class="container" style="background-color: #00000083; border-radius: 10px; box-shadow: 0px 0px 10px #000000; padding: 20px;">
  <div class="container text-center my-2">
    <div class="row mx-auto my-auto justify-content-center">

    <!-- Main content -->
    <div class="content w-100">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header bg-white">
                <h3 class="m-0 text-dark fw-bold">{{$video->titulo_v}}</h3>
              </div>
              <div class="card-body p-4 text-start">
                
                <div class="row align-items-start">
                    
                    <!-- Columna del Video -->
                    <div class="col-12 col-md-5 col-lg-4 text-center mb-4 mb-md-0">
                        <h5 class="fw-bold mb-3 text-uppercase text-primary">VIDEO</h5>
                        <div class="mx-auto" style="width: 100%; max-width: 320px; height: 500px; overflow: hidden; border-radius: 8px;">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $video->video_url_v }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                    </div>

                    <!-- Columna de la Descripción -->
                    <div class="col-12 col-md-7 col-lg-8">
                        <h5 class="fw-bold mb-3 text-uppercase text-primary text-center text-md-start">DESCRIPCIÓN</h5>
                        <div class="descripcion-contenido p-2" style="font-size: 1.05rem; line-height: 1.7;">
                            {!! $video->descripcion_v !!}
                        </div>
                    </div>

                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    </div>
  </div>
</div>
<br><br>

<center>
    <a href="https://www.facebook.com/profile.php?id=61568396361484" target="_blank" class="btn btn-primary btn-lg btn-facebook animate__animated animate__zoomInUp animate__delay-1s"><i class="bi bi-facebook"></i></a>
    <a href="https://youtube.com/@djcreaeinnova?si=hmKOT50TGAqDILxV" target="_blank" class="btn btn-danger btn-lg btn-youtube animate__animated animate__zoomInUp animate__delay-2s"><i class="bi bi-youtube"></i></a>
    <a href="https://www.tiktok.com/@mister.mueble.per?_r=1&_t=ZS-98RzkitaoIS" target="_blank" class="btn btn-lg btn-tiktok animate__animated animate__zoomInUp animate__delay-3s"><i class="bi bi-tiktok"></i></a>
    <a href="https://www.instagram.com/djcreaeinnova?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="btn btn-lg btn-instagram animate__animated animate__zoomInUp animate__delay-4s"><i class="bi bi-instagram"></i></a>
    <a href="https://wa.me/51915061691" target="_blank" class="btn btn-secondary btn-lg btn-whatsapp animate__animated animate__zoomInUp animate__delay-5s"><i class="bi bi-whatsapp"></i></a>
</center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('js/carrousel.js') }}"></script>
</body>
</html>