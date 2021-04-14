@extends('layouts.base')
@section('content')

    <div class="product-container d-flex align-items-center flex-column">
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="{{asset($dish->img)}}" >
            <div class="card-body">
            <p class="card-text"><strong>#{{$dish->id}}</strong></p>
            <p class="card-text"><strong>Nome: </strong>{{$dish->name}}</p>
            <p class="card-text"><strong>Descrizione: </strong>{{$dish->description}}</p>
            <p class="card-text"><strong>Prezzo: </strong>{{$dish->price}}</p>
            <p class="card-text"><strong>Visibilità: </strong> {{$dish->visible}}</p>
            <p class="card-text"><strong>Vegano:</strong> {{$dish->vegan}}</p>
            <p class="card-text"><strong>Glutine:</strong> {{$dish->gluten}}</p>
            <p class="card-text"><strong>Tipo:</strong> {{$dish->type}}</p>
            <div class="card-buttons d-flex justify-content-between align-items-center">
            <a href="{{route('dishes.edit',['dish'=>$dish->id])}}" class="btn btn-success">Modifica</a>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$dish->id}}">Cancella<i class="fas fa-trash"></i>
              </button>
              @include('layouts.modal')
            </div>
            </div>
        </div>
        <div class="buttons">
          <a href="{{route('dishes.index')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Torna alla lista piatti</a>
          <a href="{{route('dishes.create')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Inserisci nuovo piatto </a>
        </div>
    </div>

    </head>
@endsection
