<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $noticias = Noticia::all();
        $noticias_user = [];
        
        foreach ($noticias as $noticia) {
            if($noticia->id_user == auth()->id()) {
                array_push($noticias_user, $noticia);
            } 
        }
        
        return view('pages.noticias.noticias', ['noticias'=>$noticias_user]);
    }

    public function create() {
        $user_id = auth()->id();
        return view('pages.noticias.create', ['user_id'=>$user_id]);
    }

    public function store(Request $request) {
        Noticia::create($request->all());
        return redirect()->route('index');
    }
    

}
