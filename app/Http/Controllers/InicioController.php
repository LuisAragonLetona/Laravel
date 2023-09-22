<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(Request $peticion) {
        $arreglo = ['nombre' => $peticion->query('nombre', 'NN')];
        return view('vista2')->with($arreglo);
    }
}
