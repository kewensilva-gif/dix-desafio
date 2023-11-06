@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
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
                <div class="d-flex">
                    <a style="cursor: pointer;" class=" mr-2 tim-icons icon-pencil text-primary cursor-pointer"></a><a style="cursor: pointer;" class="ml-2 tim-icons icon-simple-remove text-primary cursor-pointer"></a>
                </div>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection