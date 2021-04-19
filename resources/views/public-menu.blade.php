{{-- Questa è il Menu pubblico --}}
@extends('layouts.base')

@section('title','Home')

@section('content')

<div id="carrello" class="public-menu">

    <div class="wrapper-top">
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
                    <img src="{{ asset($dish->img) }}" style="width: 200px">
                    <h3>{{ $dish->name }}</h3>
                    <p>{{ $dish->description }}</p>
                    <div>
                        <span @click='addToCart({{ $dish }})'>Aggiungi a carrello</span>
                        <span> {{ $dish->price }}</span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="wrapper">
        <div class="cart">

            <div class="top-container">
                <div class="header-wrapper">
                    <div class="header-cart">
                        Il Tuo Ordine
                    </div>
                </div>

                <div class="list-container">
                    <div class="flex-wrapper" v-for='dish in cart'>

                        <div class="cart-product" >
                            <div class="cart-product-stats">
                                <div class="cart-product-stats-content">
                                    <p>@{{ dish.item.name }}</p>
                                    <p>€ @{{ (dish.item.price * dish.quantity).toFixed(2) }}</p>
                                </div>
                            </div>

                            <div class="cart-product-image">
                                <img :src="dish.item.img" style="width: 200px">
                            </div>
                        </div>

                        <div class="cart-buttons">
                            <span @click='decreaseQuantity(dish)'><i class="fas fa-minus"></i></span>
                            <span>@{{ dish.quantity }}</span>
                            <span @click='increaseQuantity(dish)'><i class="fas fa-plus"></i></span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="cart-bottom">
                <div class="total" v-if="calculateTotal == 0">
                    <h2>Il carrello è vuoto</h2>
                </div>
                <div v-else class="total">
                    <h2>Totale</h2>
                    <h2>€ @{{ calculateTotal.toFixed(2) }}</h2>
                </div>


                <div class="button-wrapper">
                    <button>
                        <span v-if="calculateTotal !== 0">
                            <a @click='saveCart' href="{{ route('checkout', $restaurant->restaurant_name) }}">Procedi all'ordine</a>
                        </span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="{{ asset('js/carrello.js') }}"></script>

@endsection
