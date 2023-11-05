@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<section>
  <div class="w-full d-flex justify-content-end mb-3">
    <a href="{{ route('create') }}" class="btn btn-secondary ">Nova notícia</a>
  </div>
  <div class="d-flex flex-wrap">
    @foreach($noticias as $noticia)
    <div class="card mx-2" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $noticia->title }}</h5>
        <p class="card-text">{{ $noticia->content }} </p>
        <!-- <a href="{{ route('noticias-destroy', ['id'=>$noticia->id]) }}" class="card-link">Remover</a> -->
        <div class="d-flex">
          <form action="{{ route('noticias-destroy', ['id' => $noticia->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Remover" class="bg-transparent border-0 text-primary">
          </form>
          <a href="{{ route('noticias-edit', ['id' => $noticia->id]) }}" class="card-link">Editar</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection