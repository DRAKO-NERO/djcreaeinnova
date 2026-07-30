<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    //cargar datos de la tabla de datos
    public function index()
    {
        $imagenes = Imagen::all();
        return view('admin.imagenes.index',['imagenes' => $imagenes]);
    }
    //vista de formulario para crear registro de imagen
    public function create()
    {
        return view('admin.imagenes.create');
    }

    //almacenar la informacion que mandamos desde el formulario
    public function store(Request $request){

    $request->validate([
            'titulo_i' => 'required|max:255',
            'imagen_i' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descripcion_i' => 'required',
        ]);
        
        $imagen = new Imagen();
        $imagen->titulo_i = $request->titulo_i;
        //$imagen_i = $request->file('imagen_i');
        $imagen->imagen_i = $request->file('imagen_i')->store('portadas_uploadsimg', 'public');
        $imagen->descripcion_i = $request->descripcion_i;
        $imagen->save();

        return redirect()->route('imagenes.index')->with('mensaje', 'Imagen Creado Exitosamente.');
    }
    //muestra un registro en especifico
    public function show($id){
        $imagen = Imagen::findorFail($id);
        return view('admin.imagenes.show', ['imagen' => $imagen]);
    }

    //vista y carga los datosque se quieren editar
    public function edit($id){
        $imagen = Imagen::findorFail($id);
        return view('admin.imagenes.edit', ['imagen' => $imagen])->with('mensaje', 'Imagen Editado Exitosamente.');
    }

    //actualiza la informacion que esta en la vista edit
    public function update(Request $request, $id){
        $request->validate([
            'titulo_i' => 'required|max:255',
            'descripcion_i' => 'required',

        ]);
        
        $imagen = Imagen::find($id);
        $imagen->titulo_i = $request->titulo_i;
        if ($request->hasFile('imagen_i')) {
            Storage::delete('public/'.$imagen->imagen_i);
            $imagen->imagen_i = $request->file('imagen_i')->store('portadas_uploadsimg', 'public');
        }
        $imagen->descripcion_i = $request->descripcion_i;
        $imagen->save();

        return redirect()->route('imagenes.index')->with('mensaje', 'Imagen Editado Exitosamente.');
    }

    //elimina el registro especifico
    public function destroy($id){
        Imagen::destroy($id);
        return redirect()->route('imagenes.index')->with('mensaje', 'Imagen Eliminado Exitosamente.');
    }
        public function datos_imagen($id){
        $imagen = Imagen::findorFail($id);
        return view('imagen', ['imagen' => $imagen]);
    }
    //
}