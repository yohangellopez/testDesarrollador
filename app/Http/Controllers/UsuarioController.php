<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;


class UsuarioController extends Controller
{

    public function index(){

        // Extraer datos de API Jsonplaceholder de publicaciones
        $usuarios= HTTP::get('http://jsonplaceholder.typicode.com/posts');
        return $usuarios;
        
    }

}
