<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('vista1', ['nombre' => 'Luis']);
});
Route::get('/persona', 'App\Http\Controllers\PersonaController@index');
Route::get('/inicio', 'App\Http\Controllers\InicioController@index');
//ejemplo 1 - regresando texto
Route::get('/texto', function () {
    return '<h1>esto es un texto de prueba</h1>';
});
//ejemplo 2 - con array
Route::get('/arreglo', function () {
    // $arreglo = ['lunes', 'martes', 'miercoles'];
    $arreglo = [
        'Id' => '1',
        'Descripcion' => 'Producto 1'
    ];/* arreglo asociativo */
    return $arreglo;
});
//ejemplo 3 - parámetros
Route::get('/nombre/{nombre}', function ($nombre) {
    return '<h1>El nombre es: ' . $nombre . '</h1>';
});
//ejemplo 4 - parametros por default
Route::get('/cliente/{cliente?}', function ($cliente = 'Cliente general') {
    return '<h1>El Cliente es: ' . $cliente . '</h1>';
});
//ejemplo 5 - redireccionamiento por nombre
Route::get('/ruta1', function () {
    return '<h1>esta es la vista de la ruta 1</h1>';
})->name('rutaNro1');
Route::get('/ruta2', function () {
    //return '<h1>esta es la vista de la ruta 2</h1>';
    return redirect()->route('rutaNro1');
});

//ejemplo 6
Route::get('/usuario/{usuario}', function ($usuario) {
    return '<h1>El usuario es: ' . $usuario . '</h1>';
})->where('usuario', '[0-9]+');
//})->where('usuario', '[A-Za-z]+');

/* if (View::exists('vista2')) {
    Route::get('/', function () {
        return view('vista2');
    });
} else {
    Route::get('/', function () {
        return 'la vista solicitada no existe';
    });
} */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
