@extends('layouts.main')

@section('title', $galeria->title)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/galerias/{{ $galeria->image }}" class="img-fluid" alt="{{ $galeria->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $galeria->title }}</h1>
        <p class="galeria-city"><ion-icon name="location-outline"></ion-icon> {{ $galeria->city }}</p>
        <p class="galeria-participants"><ion-icon name="people-outline"></ion-icon> {{ count($galeria->users) }} Participantes</p>
        <p class="galeria-owner"><ion-icon name="star-outline"></ion-icon> {{ $galeriaOwner['name'] }}</p>
        @if(!$hasUserJoined)
          <form action="/galerias/join/{{ $galeria->id }}" method="POST">
            @csrf
            <a href="/galerias/join/{{ $galeria->id }}" 
              class="btn btn-primary" 
              id="galeria-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Confirmar Presença
            </a>
          </form>
        @else
          <p class="already-joined-msg">Você já está participando desta galeria!</p>
        @endif
        <h3>A galeria conta com:</h3>
        <ul id="items-list">
        @foreach($galeria->items as $item)
          <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
        @endforeach
        </ul>
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre a galeria:</h3>
        <p class="galeria-description">{{ $galeria->description }}</p>
      </div>
    </div>
  </div>

@endsection
