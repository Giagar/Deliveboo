@extends('layouts.baseuser')

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
    <h3>Le tue informazioni</h3>
    <ul>
        <li><span>Nome</span> {{Auth::user()->name}}</li>
        <li><span>Cognome</span> {{Auth::user()->surname}}</li>
        <li><span>Nome Ristorante</span> {{Auth::user()->restaurant_name}}</li>
        <li><span>Descrizione Ristorante</span> {{Auth::user()->restaurant_description}}</li>
        <li><span>Foto</span> <img src="{{asset(Auth::user()->img)}}" alt="photo"></li>
        <li><span>Email</span> {{Auth::user()->email}}</li>
        <li><span>Indirizzo</span> {{Auth::user()->address}}</li>
        <li><span>Telefono</span> {{Auth::user()->phone_number}}</li>
        <li><span>Partita iva</span> {{Auth::user()->p_iva}}</li>

    </ul>
</div>

<div class="boxes-container">
    <div class="box">
        <img src="https://i.pinimg.com/originals/77/b1/db/77b1db46af01fe8737793239f848506a.png" alt="">
        <button class="btn btn-bg-black btn-dark">
            <a href="{{route('dishes.index')}}">Vai ai piatti</a>
        </button>
        {{-- partendo dalla index --}}
    </div>

    <div class="box">
        <img src="https://www.comune.somaglia.lo.it/wp-content/uploads/blocknotes.jpg" alt="">
        <button class="btn btn-bg-black btn-dark">
            <a href="{{route('orders')}}">Vai agli ordini</a>
        </button>
    </div>

    <div class="box">
        <img src="https://www.giuseppefava.com/wp-content/uploads/2017/09/statistiche_per_wordpress.jpg" alt="">
        <button class="btn btn-bg-black btn-dark">
            <a href="{{route('statistics')}}">Vai alle statistiche</a>
        </button>
    </div>
</div>
</div>
@endsection









