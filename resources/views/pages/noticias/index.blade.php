@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<section>
  @if (session('mensagem'))
      <div class="alert alert-success">
          {{ session('mensagem') }}
      </div>
  @endif
  <div class="w-full d-flex justify-content-between align-items-center mb-3">
    <form style="margin: auto 0;" action="{{ route('index') }}" method="get">
      <input class="form-group rounded border border-dark-subtle py-2 pl-2" type="text" name="search" id="search" placeholder="Pesquise pelo título">
      <input type="submit" name="" id="" class="btn btn-secondary" value="Pesquisar">
    </form>
    @if($search)
      <a  href="{{ route('index') }}" class="btn btn-danger">Voltar</a>
    @else
      <a href="{{ route('create') }}" class="btn btn-secondary">Nova notícia</a>
    @endif
  </div>
  
  <div class="d-flex flex-wrap">
    
    @foreach($noticias as $noticia)
    <div class="card mx-2 position-relative" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $noticia->title }}</h5>
        <p class="card-text">{{ $noticia->content }} </p>
        
          <form  action="{{ route('noticias-destroy', ['id' => $noticia->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            
            <input type="submit" name="sub" value="x" class="rounded-circle px-2 bg-danger border-0 text-white" style="cursor: pointer; position: absolute; top: 5%; right: 2%;">
            
          </form>
          <a href="{{ route('noticias-edit', ['id' => $noticia->id]) }}" class="card-link text-info" style="position: absolute; bottom: 5%; right: 3%;">Editar <icon class="ml-1 tim-icons icon-pencil" ></icon></a>
      </div>
    </div>
    @endforeach
    @if($noticias == null && $search == null)
      <div style="margin: 0 auto;">Ainda não há notícias cadastradas</div>
    @elseif($search && $noticias == null)
      <div style="margin: 0 auto;">Não foi possível encontrar nenhuma notícia com: {{ $search }}</div>
    @endif

  </div>
</section>
@endsection