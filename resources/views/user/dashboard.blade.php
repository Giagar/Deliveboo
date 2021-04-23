@extends('layouts.base')

@section('title','Dashboard')

@section('content')

<div class="header">
    <h1>Benvenuto nella tua Dashboard, {{Auth::user()->name}}!</h1>
</div>
<!-- <img src="{{asset(Auth::user()->img)}}" alt=""> -->

{{-- uno rimanda alla index della crude per cui entriamo nella crude del piatto
    un altro alla lista ordini un altro al grafico statistiche--}}

<div class="main-container">
<div class="info-container">
    <h3>Le tue informazioni:</h3>
    <ul>
        <li><b>Nome:</b> {{Auth::user()->name}}</li>
        <li><b>Cognome:</b> {{Auth::user()->surname}}</li>
        <li><b>Nome Ristorante:</b> {{Auth::user()->restaurant_name}}</li>
        <li><b>Descrizione Ristorante:</b> {{Auth::user()->restaurant_description}}</li>
        <li><b>Foto:</b> <img src="{{asset(Auth::user()->img)}}" alt="photo"></li>
        <li><b>Email:</b> {{Auth::user()->email}}</li>
        <li><b>Indirizzo:</b> {{Auth::user()->address}}</li>
        <li><b>Telefono:</b> {{Auth::user()->phone_number}}</li>
        <li><b>Partita iva:</b> {{Auth::user()->p_iva}}</li>

    </ul>
</div>

<div class="boxes-container">
    <div class="box">
        <img src="https://i.pinimg.com/originals/77/b1/db/77b1db46af01fe8737793239f848506a.png" alt="">
        <button class="btn btn-secondary">
            <a href="{{route('dishes.index')}}">Vai ai piatti</a>
        </button>
        {{-- partendo dalla index --}}
    </div>

    <div class="box">
        <img src="https://www.comune.somaglia.lo.it/wp-content/uploads/blocknotes.jpg" alt="">
        <button class="btn btn-success">
            <a href="{{route('orders')}}">Vai agli ordini</a>
        </button>
    </div>

    <div class="box">
        <img src="https://www.en.regione.lombardia.it/wps/wcm/connect/51150327-6f92-4a42-9648-a093b9b0c4d6/imm-statistic.jpg?MOD=AJPERES&CACHEID=ROOTWORKSPACE-51150327-6f92-4a42-9648-a093b9b0c4d6-l-1zic2" alt="">
        <button class="btn btn-primary">
            <a href="{{route('statistics')}}">Vai alle statistiche</a>
        </button>
    </div>
</div>
</div>

@endsection









