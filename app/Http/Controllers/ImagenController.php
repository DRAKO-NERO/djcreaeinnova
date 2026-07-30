<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class ImagenController extends Controller
{
    // Cargar datos de la tabla de datos
    public function index()
    {
        $imagenes = Imagen::all();
        return view('admin.imagenes.index', ['imagenes' => $imagenes]);
    }

    // Vista de formulario para crear registro de imagen
    public function create()
    {
        return view('admin.imagenes.create');
    }

    // Almacenar la información que mandamos desde el formulario
    public function store(Request $request)
    {
        $request->validate([
            'titulo_i' => 'required|max:255',
            'imagen_i' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'descripcion_i' => 'required',
        ]);
        
        $imagen = new Imagen();
        $imagen->titulo_i = $request->titulo_i;
        
        // SUBIDA A CLOUDINARY
        if ($request->hasFile('imagen_i')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('imagen_i')->getRealPath())->getSecurePath();
            $imagen->imagen_i = $uploadedFileUrl;
        }

        $imagen->descripcion_i = $request->descripcion_i;
        $imagen->save();

        return redirect()->route('imagenes.index')->with('mensaje', 'Imagen Creada Exitosamente.');
    }

    // Muestra un registro en específico
    public function show($id)
    {
        $imagen = Imagen::findOrFail($id);
        return view('admin.imagenes.show', ['imagen' => $imagen]);
    }

    // Vista y carga los datos que se quieren editar
    public function edit($id)
    {
        $imagen = Imagen::findOrFail($id);
        return view('admin.imagenes.edit', ['imagen' => $imagen]);
    }

    // Actualiza la información que está en la vista edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo_i' => 'required|max:255',
            'descripcion_i' => 'required',
        ]);
        
        $imagen = Imagen::findOrFail($id);
        $imagen->titulo_i = $request->titulo_i;

        // ACTUALIZACIÓN EN CLOUDINARY
        if ($request->hasFile('imagen_i')) {
            $uploadedFileUrl = cloudinary()->upload($request->file('imagen_i')->getRealPath())->getSecurePath();
            $imagen->imagen_i = $uploadedFileUrl;
        }

        $imagen->descripcion_i = $request->descripcion_i;
        $imagen->save();

        return redirect()->route('imagenes.index')->with('mensaje', 'Imagen Editada Exitosamente.');
    }

    // Elimina el registro específico
    public function destroy($id)
    {
        Imagen::destroy($id);
        return redirect()->route('imagenes.index')->with('mensaje', 'Imagen Eliminada Exitosamente.');
    }

    public function datos_imagen($id)
    {
        $imagen = Imagen::findOrFail($id);
        return view('imagen', ['imagen' => $imagen]);
    }
}