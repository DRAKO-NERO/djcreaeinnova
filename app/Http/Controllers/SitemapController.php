<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\Video;

class SitemapController extends Controller
{
    public function index()
    {
        // Obtenemos todos los registros para que Google los indexe
        $imagenes = Imagen::all();
        $videos = Video::all();

        // Retornamos la vista en formato XML
        return response()->view('sitemap', compact('imagenes', 'videos'))
                        ->header('Content-Type', 'text/xml');
    }
}
