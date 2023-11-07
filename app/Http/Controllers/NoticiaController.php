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

    public function index(Request $request) {
        $search = $request->input('search');
        $noticias = $this->getNoticias($search);
        
        return view('pages.noticias.index', ['noticias'=>$noticias, 'search'=>$search]);
    }

    // Responsável pela separação das notícias que serão exibidas
    private function getNoticias($search) {
        if($search) {
            return $this->filterNoticiaBySearch($search);
        }

        return $this->filterNoticiaByUser(Noticia::all());
    }

    // Executa a filtragem pela pesquisa e por usuário
    private function filterNoticiaBySearch($search) {
        $noticias = Noticia::where([
            ['title','like','%'.$search.'%'],
        ])->get();  

        $this->filterNoticiaByUser($noticias);

        return $noticias;
    }

    // Executa a filtragem por usuário
    private function filterNoticiaByUser($noticias) {
        $noticias_user = [];
        foreach ($noticias as $noticia) {
            if($noticia->id_user == auth()->id()) {
                array_push($noticias_user, $noticia);
            } 
        }
        return $noticias_user;
    }

    public function create() {
        $user_id = auth()->id();
        
        return view('pages.noticias.create', ['user_id'=>$user_id]);
    }

    public function store(Request $request) {
        $data_insert = $request->all();
        $data_insert['id_user'] = auth()->id();

        Noticia::create($data_insert);
        session()->flash('mensagem', 'Nova notícia cadastrada com sucessos.');
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
        session()->flash('mensagem', 'Notícia atualizada com sucesso.');
        return redirect()->route('index');
    }
    
    public function destroy($id) {
        $noticia = Noticia::find($id);
        $noticia->delete();
        session()->flash('mensagem', 'Notícia removida com sucesso.');
        return redirect()->route('index');
    }
}
