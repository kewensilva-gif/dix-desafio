@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
    <form action="{{ route('admin-user-update', ['id'=>$edit_user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="mb-3 form-group">
                <label for="admin" class="form-label">Nível de acesso</label> 
                <select class="form-control" name="admin" id="admin">
                    <option value="0" @if ($edit_user->admin == 0) selected @endif>Usuário</option>
                    <option value="1" @if ($edit_user->admin == 1) selected @endif>Administrador</option>
                </select>
                <!-- <input type="text" class="form-control" id="title" placeholder="Digite o título da notícia" name="title" value="{{ $edit_user->title }}"> -->
            </div>
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Nome</label>
                <input class="form-control" id="name" placeholder="Digite o nome do usuário" name="name" value="{{ $edit_user->name }}">
            <div class="mb-3 form-group">
                <label for="email" class="form-label">E-mail</label>
                <input class="form-control" id="email" placeholder="Digite o email do usuário" name="email" value="{{ $edit_user->email }}" />
            </div>
            <div>
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection