@extends('layouts.app');

@section('content')

<a class="btn btn-primary" href="{{route('dishes.create')}}">Crea un nuovo piatto</a>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Prezzo</th>
        <th scope="col">Disponibilità</th>
        <th scope="col">Vegano</th>
        <th scope="col">Glutine</th>
        <th scope="col">Tipo</th>
        <th scope="col">Immagine</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($dishes as $dish)
        <tr>
            <th scope="row">{{$dish->id}}</th>
            <td>{{$dish->name}}</td>
            <td>{{$dish->description}}</td>
            <td>{{$dish->price}}</td>
            <td>{{$dish->visible}}</td>
            <td>{{$dish->vegan}}</td>
            <td>{{$dish->gluten}}</td>
            <td>{{$dish->type}}</td>
            <td><img style="width:80px;height:auto;" src="{{asset($dish->img)}}" alt=""></td>
           <td><a class="btn btn-primary" href="{{route('dishes.show',compact('dish'))}}">Mostra piatto</a>
           <a class="btn btn-success" href="{{route('dishes.edit',compact('dish'))}}">Modifica piatto</a>
            <form action="{{route('dishes.destroy',compact('dish'))}}" method="POST">
                @csrf
                @method('DELETE')
            <button class="btn btn-danger" type="submit">Cancella</button></form>
            </td>
          </tr>
        @endforeach

    </tbody>
  </table>
@endsection
