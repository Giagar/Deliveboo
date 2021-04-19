{{-- Questa è il Menu pubblico --}}
@extends('layouts.base')

@section('title','Home')

@section('content')

<div id="carrello">
    {{-- @dd($restaurant) --}}
    <div style="background-image: url({{ asset($restaurant->img) }})">
        <div>
            <h1>{{ $restaurant->restaurant_name }}</h1>
            <p>Menu</p>
        </div>
    </div>
    <div>
        @foreach ($restaurant->dishes as $dish)
            @if ($dish->visible)
                <img src="{{ asset($dish->img) }}">
                <h3>{{ $dish->name }}</h3>
                <p>{{ $dish->description }}</p>
                <div>
                    <span @click='addToCart({{ $dish }})'>Aggiungi a carrello</span>
                    <span> {{ $dish->price }}</span>
                </div>
            @endif
        @endforeach
    </div>
    <div>
        <div>
            <span v-if="calculateTotal !== 0">
                <a @click='saveCart' href="{{ route('checkout', $restaurant->restaurant_name) }}">Vai alla cassa</a>
        </div>
        <div v-for='dish in cart'>
            <span @click='decreaseQuantity(dish)'>Sottrai quantità</span>
            <span>@{{ dish.quantity }}</span>
            <span @click='increaseQuantity(dish)'>Aumenta quantità</span>
            <span>@{{ dish.item.name }}</span>
            <span>€ @{{ dish.item.price * dish.quantity.toFixed(2) }}</span>
        </div>
        <span v-if="calculateTotal == 0">Il carrello è vuoto</span>
        <div v-else>
            <span>Totale</span>
            <span>@{{ calculateTotal.toFixed(2) }} </span>
        </div>
    </div>
</div>
</div>
<script src="{{ asset('js/carrello.js') }}"></script>

@endsection
