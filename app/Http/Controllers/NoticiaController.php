<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function index() {
        $noticias = Noticia::all();

        return view('noticias.noticias', ['noticias'=>$noticias]);
    }

    public function create() {
        return view('noticias.create');
    }

    public function store(Request $request) {
        Noticia::create($request->all());
        return redirect()->route('index');
    }

}
