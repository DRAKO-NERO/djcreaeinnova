<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Imagen;

class VideoController extends Controller
{
    // Cargar datos de la tabla de datos
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', ['videos' => $videos]);
    }
    
    // Vista de formulario para crear registro de video
    public function create()
    {
        return view('admin.videos.create');
    }

    // Almacenar la información que mandamos desde el formulario
    public function store(Request $request)
    {
        $request->validate([
            'titulo_v' => 'required|max:255',
            'imagen_v' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'video_url_v' => 'required',
            'descripcion_v' => 'required',
        ]);
        
        $video = new Video();
        $video->titulo_v = $request->titulo_v;
        
        // SUBIDA A CLOUDINARY
        if ($request->hasFile('imagen_v')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('imagen_v')->getRealPath())->getSecurePath();
            $video->imagen_v = $uploadedFileUrl;
        }

        $video->video_url_v = $request->video_url_v;
        $video->descripcion_v = $request->descripcion_v;
        $video->save();

        // Redirección directa por URL para evitar fallo de ruta nombrada
        return redirect('/admin/videos')->with('mensaje', 'Video Creado Exitosamente.');
    }

    // Muestra un registro en específico
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.show', ['video' => $video]);
    }

    // Vista y carga los datos que se quieren editar
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', ['video' => $video]);
    }

    // Actualiza la información que está en la vista edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo_v' => 'required|max:255',
            'imagen_v' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'video_url_v' => 'required',
            'descripcion_v' => 'required',
        ]);
        
        $video = Video::findOrFail($id);
        $video->titulo_v = $request->titulo_v;

        // ACTUALIZACIÓN EN CLOUDINARY
        if ($request->hasFile('imagen_v')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('imagen_v')->getRealPath())->getSecurePath();
            $video->imagen_v = $uploadedFileUrl;
        }

        $video->video_url_v = $request->video_url_v;
        $video->descripcion_v = $request->descripcion_v;
        $video->save();

        // Redirección directa por URL para evitar fallo de ruta nombrada
        return redirect('/admin/videos')->with('mensaje', 'Video Editado Exitosamente.');
    }

    // Elimina el registro específico
    public function destroy($id)
    {
        Video::destroy($id);
        return redirect('/admin/videos')->with('mensaje', 'Video Eliminado Exitosamente.');
    }

    public function cargar_videos()
    {
        $videos = Video::all();
        $imagenes = Imagen::all();
        
        return view('index', [
            'videos' => $videos, 
            'imagenes' => $imagenes
        ]);
    }

    public function datos_video($id)
    {
        $video = Video::findOrFail($id);
        return view('video', ['video' => $video]);
    }
}