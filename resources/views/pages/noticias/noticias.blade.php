@extends('layouts.app', ['pageSlug' => 'dashboard'])
@section('content')
<section>
  <div class="w-full d-flex justify-content-end mb-3">
    <a href="{{ route('create') }}" class="btn btn-secondary ">Nova notícia</a>
  </div>
  <div class="d-flex flex-wrap">
    @if($noticias != null)
    @foreach($noticias as $noticia)
    <div class="card mx-2 position-relative" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $noticia->title }}</h5>
        <p class="card-text">{{ $noticia->content }} </p>
        
          <form  action="{{ route('noticias-destroy', ['id' => $noticia->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            
              <input type="submit" name="sub" value="x" class=" rounded-circle px-2 bg-danger border-0 text-white" style="cursor: pointer; position: absolute; top: 5%; right: 2%;">
            
          </form>
          <a href="{{ route('noticias-edit', ['id' => $noticia->id]) }}" class="card-link text-info" style="position: absolute; bottom: 5%; right: 3%;">Editar <icon class="ml-1 tim-icons icon-pencil" ></icon></a>
      </div>
    </div>
    @endforeach
    @else
    <div style="margin: 0 auto;">Ainda não há notícias cadastradas</div>
    @endif
  </div>
</section>
@endsection