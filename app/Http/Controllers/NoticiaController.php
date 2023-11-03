<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index() {
        $noticias = Noticia::all();

        dd($noticias);
    }
}
