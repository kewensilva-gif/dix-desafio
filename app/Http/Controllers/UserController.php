<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function getUsers(){
        $users = User::all();
        return view('pages.listagem-usuarios.lista_usuarios', ['users'=> $users]);
    }

    public function edit($id) {
        $edit_user = User::where('id', $id)->first();
        
        if(!empty($edit_user)) {
            return view('pages.listagem-usuarios.edit', ['edit_user' => $edit_user]);
        } else {
            return redirect()->route('admin-getUsers');
        }
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->update($request->all());
        session()->flash('mensagem', 'Informações do usuário atualizadas com sucesso.');
        return redirect()->route('admin-getUsers');
    }
    
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        session()->flash('mensagem', 'Usuário removido com sucesso.');
        return redirect()->route('admin-getUsers');
    }
}
