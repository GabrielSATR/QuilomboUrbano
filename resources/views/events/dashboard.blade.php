@extends('layouts.main')

@section('title', 'Painel')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
@auth
@if (auth()->user()->permissao == 0)
    <h1>Minhas oficinas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if($events && count($events) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td>{{ count($event->users) }}</td>
                    <td>
                        <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/events/{{ $event->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem oficinas, <a href="/events/create">criar oficina</a></p>
    @endif
</div>
@endif
@endauth
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Oficinas que estou participando</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if($eventsasparticipant && count($eventsasparticipant) > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eventsasparticipant as $event)
            <tr>
                <td scropt="row">{{ $loop->index + 1 }}</td>
                <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                <td>{{ count($event->users) }}</td>
                <td>
                    <form action="/events/leave/{{ $event->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> 
                            Sair da Oficina
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach    
    </tbody>
</table>
@else
<p>Você ainda não está participando de nenhuma oficina, <a href="/">veja toda as oficinas</a></p>
@endif
</div>
@endsection
