@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nível de Acesso</th>
            <th scope="col">Nome</th>
            <th scope="col">E-Mail</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection