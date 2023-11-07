@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
@if (session('mensagem'))
      <div class="alert alert-success">
          {{ session('mensagem') }}
      </div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nível de Acesso</th>
            <th scope="col">Nome</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            @if($user->admin == 1)
            <td>Administrador</td>
            @else
            <td>Usuário</td>
            @endif
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin-user-edit', ['id' => $user->id]) }}" style="cursor: pointer;" class="mr-2 tim-icons icon-pencil text-info cursor-pointer"></a>
                    
                    <form class="text-center" action="{{ route('admin-user-destroy', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <input type="submit" name="sub" value="x" class="text-danger border-0 bg-transparent" style="cursor: pointer; width: 100%; font-size: 1.5rem;">
                        
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection