@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
@foreach($noticias as $noticia)
<section>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $noticia->title }}</h5>
      <p class="card-text">{{ $noticia->content }} </p>
      <a href="#" class="card-link">Remover</a>
      <a href="#" class="card-link">Editar</a>
    </div>
  </div>

  <a href="{{ route('create') }}" class="btn btn-secondary">Nova notícia</a>
</section>
@endforeach
@endsection