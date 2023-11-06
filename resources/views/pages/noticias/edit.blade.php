@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
    <form action="{{ route('noticias-update', ['id'=>$edit_noticia->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
        <div class="mb-3 form-group">
            <label for="title" class="form-label">Título da notícia</label> 
            <input type="text" class="form-control" id="title" placeholder="Digite o título da notícia" name="title" value="{{ $edit_noticia->title }}">
        </div>
            <div class="mb-3 form-group">
                <label for="content" class="form-label">Conteúdo</label>
                <textarea class="form-control" id="content" placeholder="Digite o conteúdo da notícia" name="content">{{ $edit_noticia->content }}</textarea>
            </div>
            <div>
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
@endsection