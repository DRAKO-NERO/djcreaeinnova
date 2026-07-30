<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    //cargar datos de la tabla de datos
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index',['videos' => $videos]);
    }
    
    //vista de formulario para crear registro de video
    public function create()
    {
        return view('admin.videos.create');
    }

    //almacenar la informacion que mandamos desde el formulario
    public function store(Request $request){

    $request->validate([
            'titulo_v' => 'required|max:255',
            'imagen_v' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video_url_v' => 'required',
            'descripcion_v' => 'required',
        ]);
        
        $video = new Video();
        $video->titulo_v = $request->titulo_v;
        
        //$imagen_v = $request->file('imagen_v');
        $video->imagen_v = $request->file('imagen_v')->store('portadas_uploads', 'public');
        $video->video_url_v = $request->video_url_v;
        $video->descripcion_v = $request->descripcion_v;
        $video->save();

        return redirect()->route('videos.index')->with('mensaje', 'Video Creado Exitosamente.');
    }
    //muestra un registro en especifico
    public function show($id){
        $video = Video::findorFail($id);
        return view('admin.videos.show', ['video' => $video]);
    }
    //vista y carga los datosque se quieren editar
    public function edit($id){
        $video = Video::findorFail($id);
        return view('admin.videos.edit', ['video' => $video])->with('mensaje', 'Video Editado Exitosamente.');
    }
    //actualiza la informacion que esta en la vista edit
    public function update(Request $request, $id){
        $request->validate([
            'titulo_v' => 'required|max:255',
            'video_url_v' => 'required',
            'descripcion_v' => 'required',
        ]);
        
        $video = Video::find($id);
        $video->titulo_v = $request->titulo_v;
        if ($request->hasFile('imagen_v')) {
            Storage::delete('public/'.$video->imagen_v);
            $video->imagen_v = $request->file('imagen_v')->store('portadas_uploads', 'public');
        }
        $video->video_url_v = $request->video_url_v;
        $video->descripcion_v = $request->descripcion_v;
        $video->save();

        return redirect()->route('videos.index')->with('mensaje', 'Video Editado Exitosamente.');
    }
    //elimina el registro especifico
    public function destroy($id){
        Video::destroy($id);
        return redirect()->route('videos.index')->with('mensaje', 'Video Eliminado Exitosamente.');
    }

public function cargar_videos()
{
    $videos = Video::all();
    $imagenes = Imagen::all(); // <-- Consultamos las imágenes
    
    // Enviamos ambas variables a la vista
    return view('index', [
        'videos' => $videos, 
        'imagenes' => $imagenes
    ]);
}

    public function datos_video($id){
        $video = Video::findorFail($id);
        return view('video', ['video' => $video]);
    }
//
}
