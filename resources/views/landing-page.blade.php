@extends('layouts.base')

@section('title','Home')

@section('content')

<main class="container">
    <h2 class="text-center">Seleziona una categoria</h2>
    <section class="d-flex flex-wrap justify-content-center categoriesSection">
        <div class="categories" class="text-center" @click="selectedCategory(category)" v-for="category in categories">
            <img :src="category.img" alt="">
            <h4>@{{category.name}}</h4>
        </div>
        @if (Request::route()->getName() == 'landing')
              <form class="form-inline my-2 my-lg-0">
                <input @keyup="filterByName()" class="form-control mr-sm-2" type="search" v-model="searchName" placeholder="Ricerca per nome" aria-label="Search">
                <input @keyup="filterByAddress()" class="form-control mr-sm-2" type="search" v-model="searchAddress" placeholder="Ricerca per indirizzo" aria-label="Search">
              </form>
        @endif
    </section>

    <h2 class="text-center" style="margin-top: 20px">Lasciati ispirare, ordina e ricevi comodamente a casa tua!</h2>
    <section class="d-flex flex-wrap justify-content-center restaurantsSection">

        {{-- versione vecchia --}}
        {{-- <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="restaurant in restaurants" v-if="selected === 'All' || onSearch">
            <a :href="'/restaurants/' + restaurant.restaurant_name">
                <span>@{{restaurant.restaurant_name}}</span>
            </a>
            <div v-for="category in restaurant.categories">
                <h5>@{{category.name}}</h5>
            </div>
        </div> --}}
        {{-- /versione vecchia --}}

        {{-- versione nuova --}}
        <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="(restaurant, index) in restaurants" v-if="(selected === 'All') && index < 9">
            <a :href="'/restaurants/' + restaurant.restaurant_name">
                <span>@{{restaurant.restaurant_name}}</span>
            </a>
            <div v-for="category in restaurant.categories">
                <h5>@{{category.name}}</h5>
            </div>
        </div>
        <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="(restaurant, index) in restaurants" v-if="(selected !== 'All')">
            <a :href="'/restaurants/' + restaurant.restaurant_name">
                <span>@{{restaurant.restaurant_name}}</span>
            </a>
            <div v-for="category in restaurant.categories">
                <h5>@{{category.name}}</h5>
            </div>
        </div>
        {{-- /versione nuova --}}

    </section>
</main>

        <!--Waves-->
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,140,64,0.7)" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,140,64,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,140,64,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="rgb(255,140,64)" />
            </g>
        </svg>


@endsection
