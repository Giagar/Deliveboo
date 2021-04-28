@extends('layouts.baseuser')
@section('content')


    <div class="section product-container d-flex align-items-center flex-column crud-show" style="padding-top: 25px; padding-bottom: 25px;">
        <div class="section-title-container">
            <h1 class="section-title">{{ $dish->name }}</h1>
        </div>
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="{{asset($dish->img)}}" >
            <div class="card-body">
            <p class="card-text"><strong>Nome: </strong>{{$dish->name}}</p>
            <p class="card-text"><strong>Descrizione: </strong>{{$dish->description}}</p>
            <p class="card-text"><strong>Prezzo: </strong>{{$dish->price}} €</p>
            <p class="card-text"><strong>Visibile: </strong> {{$dish->visible ? 'Sì' : 'No'}}</p>
            <p class="card-text"><strong>Vegano:</strong> {{$dish->vegan ? 'Sì' : 'No'}}</p>
            <p class="card-text"><strong>Glutine:</strong> {{$dish->gluten ? 'Sì' : 'No'}}</p>
            <p class="card-text"><strong>Tipo:</strong> {{$dish->type}}</p>
            {{-- <div class="card-buttons d-flex justify-content-between align-items-center">
            <a href="{{route('dishes.edit',['dish'=>$dish->id])}}" class="btn btn-bg-salmon my-btn-edit">Modifica</a>
              <button type="button" class="btn btn-dark btn-bg-black my-btn-delete" data-toggle="modal" data-target="#exampleModal{{$dish->id}}">Cancella<i class="fas fa-trash"></i>
              </button>
              @include('layouts.modal')
            </div> --}}
            </div>
        </div>
        <div class="buttons" style="margin-top: 15px;">
            <a href="{{route('dishes.index')}}" class="btn btn-dark btn-bg-black" role="button" aria-pressed="true">Torna alla lista piatti</a>
            <a href="{{route('dishes.create')}}" class="btn btn-bg-salmon " role="button" aria-pressed="true">Inserisci nuovo piatto </a>
        </div>
    </div>

    </head>
@endsection
