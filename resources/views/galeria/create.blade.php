@extends('layouts.main')

@section('title', 'Criar Galeria')

@section('content')

@auth
@if (auth()->user()->permissao == 0)
<div id="gallery-create-container" class="col-md-6 offset-md-3">
  <h1>Crie sua galeria de fotos</h1>
  <form action="/galerias" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Título:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Título da galeria">
    </div>
    <div class="form-group">
      <label for="description">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Descrição da galeria"></textarea>
    </div>
    <div class="form-group">
      <label for="images">Imagens:</label>
      <input type="file" id="images" name="images[]" class="form-control-file" multiple>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Galeria">
  </form>
</div>
@endif
@endauth
@endsection
