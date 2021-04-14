@extends('layouts.base')

@section('content')
<nav class="navbar navbar-light bg-light">
    <div class="d-flex">
    <a class="btn btn-outline-dark" href="{{route('dishes.index')}}">Tutti i piatti</a>
    <form action="{{ route('dishes.index') }}" class="form-inline " method="GET">
    <button class="btn btn-outline-dark"  name="search-vegan" value="on" type="submit">Piatti vegani</button>
    </form>
    <form action="{{ route('dishes.index') }}" class="form-inline " method="GET">
    <button class="btn btn-outline-dark" type="submit" name="search-gluten" value="on">Piatti senza glutine</button>
    </form>
    <form action="{{ route('dishes.index') }}" class="form-inline " method="GET">
    <button class="btn btn-outline-dark" type="submit" name="search-price" value="on">Ordina per prezzo</button>
    </form>
    <form action="{{ route('dishes.index') }}" class="form-inline" method="GET">
    <input class="form-control" type="search" placeholder="Cerca per tipo" name="search-type" aria-label="Search">
    <button class="btn btn-outline-dark" type="submit">Cerca</button>
    </form>
    </div>
    <a class="btn btn-success" href="{{route('dishes.create')}}">Crea piatto</a>
</nav>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Disponibile</th>
        <th scope="col">Vegano</th>
        <th scope="col">Glutine</th>
        <th scope="col">Tipo</th>
        <th scope="col">Immagine</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dishes as $dish)
        <tr>
            <th scope="row">{{$dish->id}}</th>
            <td>{{$dish->name}}</td>
            <td>{{$dish->description}}</td>
            <td>{{$dish->price }}</td>
            <td>{{$dish->visible ? 'Si' : 'No'}}</td>
            <td>{{$dish->vegan ? 'Si' : 'No'}}</td>
            <td>{{$dish->gluten ? 'Si' : 'No'}}</td>
            <td>{{$dish->type}}</td>
            <td><img style="width:80px;height:auto;" src="{{asset($dish->img)}}" alt=""></td>
           <td><a class="btn btn-primary" href="{{route('dishes.show',compact('dish'))}}">Mostra piatto</a>
           <a class="btn btn-success" href="{{route('dishes.edit',compact('dish'))}}">Modifica piatto</a>
           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$dish->id}}">Cancella<i class="fas fa-trash"></i>
           </button>
           @include('layouts.modal')
            </td>
          </tr>

        @endforeach

    </tbody>
  </table>
@endsection
