{{-- Questa è il Menu pubblico --}}
@extends('layouts.base')

@section('title',$restaurant->restaurant_name)

@section('content')

<div id="carrello" class="public-menu">

    <div class="header" style="background-image:radial-gradient(rgba(0,2,17,0.16) 0%,rgba(0,2,17,0.4) 100%),url({{ asset($restaurant->img) }})">
        <p class="mobile-restaurant-name">{{$restaurant->restaurant_name}}</p>
        <p class="mobile-restaurant-description">{{$restaurant->restaurant_description}}</p>
        {{-- <div class="restaurant-info" style="background-image: url({{asset('images-websites/forchetta.jpg')}})">
            <h1>{{ $restaurant->restaurant_name }}</h1>
            <ul>
                <li>
                    <h4>{{$restaurant->restaurant_description}}</h4>
                </li>
                <li>
                    <span class="info-icon"><i class="fas fa-map-marker-alt"></i></span><span class="info-detail">{{$restaurant->address}}</span>
                </li>
                <li>
                <span class="info-icon"><i class="fas fa-mobile-alt"></i></span><span class="info-detail">{{$restaurant->phone_number}}</span>
                </li>
                <li>
                    <span class="info-icon"><i class="fas fa-envelope-open-text"></i></span><span class="info-detail">{{$restaurant->email}}</span>
                </li>
            </ul>
        </div> --}}
        <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <h1>{{ $restaurant->restaurant_name }}</h1>
              </div>
              <div class="flip-card-back">
                <ul>
                    <li>
                        <span class="info-icon"><i class="fas fa-map-marker-alt"></i></span><span class="info-detail">{{$restaurant->address}}</span>
                    </li>
                    <li>
                    <span class="info-icon"><i class="fas fa-mobile-alt"></i></span><span class="info-detail">{{$restaurant->phone_number}}</span>
                    </li>
                    <li>
                        <span class="info-icon"><i class="fas fa-envelope-open-text"></i></span><span class="info-detail">{{$restaurant->email}}</span>
                    </li>
                </ul>
              </div>
            </div>
          </div>
    </div>

    <div class="mobile-restaurant-info">
        <ul>
            <li>
                <span class="info-icon"><i class="fas fa-map-marker-alt"></i></span><span class="info-detail">{{$restaurant->address}}</span>
            </li>
            <li>
               <span class="info-icon"><i class="fas fa-mobile-alt"></i></span><span class="info-detail">{{$restaurant->phone_number}}</span>
            </li>
            <li>
                <span class="info-icon"><i class="fas fa-envelope-open-text"></i></span><span class="info-detail">{{$restaurant->email}}</span>
            </li>
        </ul>
    </div>
    @php

$count=0;
foreach ($restaurant->dishes as $dish) {
        if ($dish->visible){
          $count +=1;
        }
    }
    @endphp

    @if ($count>0)
    <div class="main">
    <section class="dishes-list-container">
        <div class="dishes-list">

            @foreach ($restaurant->dishes as $dish)
                @if ($dish->visible)
                @php
                $dish->img=asset($dish->img);
                @endphp
                <div class="dish">
                    <div class="dish-left" :style="{'background-image':'url({{ $dish->img }})'}">
                        {{-- <img src="{{ asset($dish->img) }}"> --}}
                    </div>
                    <div class="dish-right">
                        <div class="dish-right-top">
                            <h3>{{ $dish->name }}</h3>
                            <p>{{ $dish->description }}</p>
                        </div>
                        <div class="dish-right-bottom">
                            <div class="price"><b>Prezzo: {{ $dish->price }} €</b></div>
                            <button class="btn" @click='addToCart({{ $dish }})'>Aggiungi a carrello</button>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            <section class="mobile-cart-section">
                <div class="mobile-cart-wrapper">
                    <div class="text-center">
                        <h4>Il Tuo Ordine</h4>
                    </div>
                    <div class="mobile-cart" v-for='dish in cart'>
                        <p><b>@{{ dish.item.name }}</b></p>
                        <div class="mobile-cart-right">
                            <span class="changeQuantity" @click='decreaseQuantity(dish)'><i class="fas fa-minus"></i></span>
                            <span>@{{ dish.quantity }}</span>
                            <span class="changeQuantity" @click='increaseQuantity(dish)'><i class="fas fa-plus"></i></span>
                        </div>
                    </div>
                    <hr>
                    <p class="total-mobile"><b>Totale</b> € @{{ calculateTotal.toFixed(2) }}</p>
                </div>
                <div class="button-wrapper-mobile" v-if="calculateTotal !== 0">
                    <button class="btn">
                        <a @click='saveCart' href="{{ route('checkout', $restaurant->restaurant_name) }}">Procedi all'ordine</a>
                    </button>
                </div>
            </section>
        </div>
    </section>

    <div class="wrapper-cart">
        <section class="cart">

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
                                    <p><b>@{{ dish.item.name }}</b></p>
                                    <p>€ @{{ (dish.item.price * dish.quantity).toFixed(2) }}</p>
                                </div>
                            </div>

                            <div class="cart-product-image" :style="{'background-image':'url('+dish.item.img+')'}">
                                <!-- <img :src="dish.item.img"> -->
                            </div>
                        </div>

                        <div class="cart-buttons">
                            <span class="changeQuantity" @click='decreaseQuantity(dish)'><i class="fas fa-minus"></i></span>
                            <span>@{{ dish.quantity }}</span>
                            <span class="changeQuantity" @click='increaseQuantity(dish)'><i class="fas fa-plus"></i></span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="cart-bottom">
                <div v-if="calculateTotal == 0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="grey" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                    <h2 id="empty">Il carrello è vuoto</h2>
                </div>
                <div v-else class="total">
                    <h2>Totale</h2>
                    <h2>€ @{{ calculateTotal.toFixed(2) }}</h2>
                </div>


                <div class="button-wrapper" v-if="calculateTotal !== 0">
                    <button class="btn">
                        <a @click='saveCart' href="{{ route('checkout', $restaurant->restaurant_name) }}">Procedi all'ordine</a>
                    </button>
                </div>
            </div>
        </section>
    </div>
</div>
@else
<p class="no-dishes">Il ristorante è chiuso.</p>
@endif
</div>


<script src="{{ asset('js/carrello.js') }}"></script>

@endsection
