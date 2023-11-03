@extends('layouts.app')
@section('content')
@foreach($noticias as $noticia)
<section>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $noticia->title }}</h5>
      <p class="card-text">{{ $noticia->content }} </p>
      <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a>
    </div>
  </div>

  <a href="{{ route('create') }}" class="btn btn-secondary">Nova notícia</a>
</section>
@endforeach
@endsection