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
        $data_insert = $request->all();
        $data_insert['id_user'] = auth()->id();

        Noticia::create($data_insert);
        return redirect()->route('index');
    }

    public function edit($id) {
        $edit_noticia = Noticia::where('id', $id)->first();
        if(!empty($edit_noticia)) {
            return view('pages.noticias.edit', ['edit_noticia' => $edit_noticia]);
        } else {
            return redirect()->route('index');
        }
    }

    public function update(Request $request, $id) {
        $noticias = Noticia::find($id);
        $noticias->update($request->all());

        return redirect()->route('index');
    }

    public function destroy($id) {
        $noticia = Noticia::find($id);
        $noticia->delete();
        return redirect()->route('index');
    }
}
