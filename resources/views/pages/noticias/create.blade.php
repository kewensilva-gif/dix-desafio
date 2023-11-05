@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<form action="{{ route('store') }}" method="POST">
    @csrf
    <div class="form-group">
    <!--     <div class="mb-3 form-group">
        <label for="id" class="form-label">Email address</label>
        <input type="text" class="form-control" id="id" placeholder="name@example.com" name="id">
    </div> -->
        <div class="mb-3 form-group">
            <label for="title" class="form-label">Título da notícia</label> 
            <input type="text" class="form-control" id="title" placeholder="Digite o título da notícia" name="title"> 
        </div>
        <div class="mb-3 form-group">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea class="form-control" id="content" placeholder="Digite o conteúdo da notícia" name="content"></textarea>
        </div>
        <!--     <div class="mb-3 form-group">
        <label for="id_user" class="form-label">id_user</label>
        <input type="text" class="form-control" id="id_user" placeholder="name@example.com" name="id_user" value="{{$user_id}}" disabled>
    </div> -->
        <div>
            <input type="submit" class="btn btn-primary">
        </div>
    </div>
</form>
@endsection