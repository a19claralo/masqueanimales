<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\MascotasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//MASCOTAS
//filtrado de categorias
Route::get('mascotas/{categoria}/filtrar', [MascotasController::class, 'filtrar'])->name('mascotas.filtrar');
//ruta resource que gestiona el controlador de mascostas
Route::resource('mascotas', MascotasController::class);

//ANUNCIOS
//filtrado de categorias
Route::get('anuncios/{categoria}/filtrar', [AnunciosController::class, 'filtrar'])->name('anuncios.filtrar');
//ruta para mis anuncios
Route::get('/anuncios/misanuncios/', [AnunciosController::class, 'misAnuncios'])->name('anuncios.misAnuncios');
//ruta que gestiona el controlador de anuncios
Route::resource('anuncios', AnunciosController::class);

//CONTACTAR
Route::get('contactar', [App\Http\Controllers\ContactarController::class, 'create'])->name('contactar.create');
Route::post('contactar', [App\Http\Controllers\ContactarController::class, 'enviar'])->name('contactar.enviar');
