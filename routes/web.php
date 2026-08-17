<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitemapController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/', function () {
    return view('index');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function(){
    //rutas para el administrador
Route::get('/admin', function () {
        $total_usuarios = \App\Models\User::count();
        $total_videos = \App\Models\Video::count(); 
        $total_imagenes = \App\Models\Imagen::count();

        return view('admin.index', compact('total_usuarios', 'total_videos', 'total_imagenes')); 
    });
//rutas para el administrador-Peliculas
//Route::get('/admin/videos', [App\Http\Controllers\VideoController::class, 'index']);
//Route::get('/admin/videos/create', [App\Http\Controllers\VideoController::class, 'create']);
Route::resource('admin/videos', App\Http\Controllers\VideoController::class);
Route::resource('admin/imagenes', App\Http\Controllers\ImagenController::class);
Route::resource('admin/usuarios', App\Http\Controllers\UsuarioController::class);

});




Route::get('/', [App\Http\Controllers\VideoController::class, 'cargar_videos']);
Route::get('/video/{id}', [App\Http\Controllers\VideoController::class, 'datos_video']);
Route::get('/imagen/{id}', [App\Http\Controllers\ImagenController::class, 'datos_imagen']);
//Route::get('/imagenes', [App\Http\Controllers\ImagenController::class, 'cargar_imagenes']);
