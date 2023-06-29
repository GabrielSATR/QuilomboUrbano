@extends('layouts.main')

@section('title', 'Criar Oficina')

@section('content')

@auth
@if (auth()->user()->permissao == 0)
<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Crie a seu oficina</h1>
  <form action="/events" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Imagem da Oficina:</label>
      <input type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="title">Oficina:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Nome da oficina">
    </div>
    <div class="form-group">
      <label for="date">Data da oficina:</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
      <label for="title">Cidade:</label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Local da oficina">
    </div>
    <div class="form-group">
      <label for="title">A oficina é privada?</label>
      <select name="private" id="private" class="form-control">
        <option value="0">Não</option>
        <option value="1">Sim</option>
      </select>
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer na oficina?"></textarea>
    </div>
    <div class="form-group">
      <label for="title">Adicione itens de infraestrutura:</label>
      <div class="form-group">	
        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
      </div>
      <div class="form-group">	
        <input type="checkbox" name="items[]" value="Palco"> Palco
      </div>
      <div class="form-group">	
        <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
      </div>
      <div class="form-group">	
        <input type="checkbox" name="items[]" value="Open Food"> Open food
      </div>
      <div class="form-group">	
        <input type="checkbox" name="items[]" value="Brindes"> Brindes
      </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Oficina">
  </form>
</div>
@endif
@endauth
@endsection