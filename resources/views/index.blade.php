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

<div class="container overflow-hidden">
<div class="container text-center px-2 my-3">
    <h1 class="titulo1 animate__animated animate__slideInDown mb-0 text-break">
        DJ CREA E INNOVA
    </h1>
    <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
        <a href="https://www.facebook.com/profile.php?id=61568396361484" target="_blank" class="btn btn-primary btn-lg btn-facebook animate__animated animate__zoomInUp animate__delay-1s"><i class="bi bi-facebook"></i></a>
        <a href="https://youtube.com/@djcreaeinnova?si=hmKOT50TGAqDILxV" target="_blank" class="btn btn-danger btn-lg btn-youtube animate__animated animate__zoomInUp animate__delay-2s"><i class="bi bi-youtube"></i></a>
        <a href="https://www.tiktok.com/@mister.mueble.per?_r=1&_t=ZS-98RzkitaoIS" target="_blank" class="btn btn-lg btn-tiktok animate__animated animate__zoomInUp animate__delay-3s"><i class="bi bi-tiktok"></i></a>
        <a href="https://www.instagram.com/djcreaeinnova?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="btn btn-lg btn-instagram animate__animated animate__zoomInUp animate__delay-4s"><i class="bi bi-instagram"></i></a>
        <a href="https://wa.me/51915061691" target="_blank" class="btn btn-secondary btn-lg btn-whatsapp animate__animated animate__zoomInUp animate__delay-5s"><i class="bi bi-whatsapp"></i></a>
    </div>
</div>
</div>

<br>

<!-- SECCIÓN DE VIDEOS -->
<div class="container py-3" style="background-color: #00000083; border-radius: 10px; box-shadow: 0px 0px 10px #000000;">
  <h3 class="text-center text-white"><b>Videos</b></h3>
  <div class="container text-center my-3 px-0">
    <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @foreach($videos as $video)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="col-12 col-md-3 px-3 mx-auto">
                        <div class="card bg-transparent border-0">
                            <div class="card-img text-center">
                                <a href="{{url('/video/'.$video->id)}}">
                                    <img src="{{ $video->imagen_v }}" alt="{{ $video->titulo_v }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 8px;">
                                </a>
                            </div>
                            <h6 class="text-center text-white mt-2">{{ $video->titulo_v }}</h6>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>

            <!-- Controles Videos -->
            <a class="carousel-control-prev bg-transparent w-auto px-2" href="#recipeCarousel1" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-auto px-2" href="#recipeCarousel1" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
  </div>
</div>

<br><br>

<!-- SECCIÓN DE IMÁGENES -->
<div class="container py-3" style="background-color: #00000083; border-radius: 10px; box-shadow: 0px 0px 10px #000000;">
  <h3 class="text-center text-white"><b>Imágenes</b></h3>
  <div class="container text-center my-3 px-0">
    <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel2" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
              @foreach($imagenes as $imagen)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="col-12 col-md-3 px-3 mx-auto">
                        <div class="card bg-transparent border-0">
                            <div class="card-img text-center">
                                <a href="{{url('/imagen/'.$imagen->id)}}">
                                    <img src="{{ $imagen->imagen_i }}" alt="{{ $imagen->titulo_i }}" class="img-fluid w-100" style="height: 250px; object-fit: cover; border-radius: 8px;">
                                </a>
                            </div>
                            <h6 class="text-center text-white mt-2">{{ $imagen->titulo_i }}</h6>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>

            <!-- Controles Imágenes (Corregido ícono de prev) -->
            <a class="carousel-control-prev bg-transparent w-auto px-2" href="#recipeCarousel2" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-auto px-2" href="#recipeCarousel2" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
  </div>
</div>

<br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('js/carrousel.js') }}"></script>
</body>
</html>