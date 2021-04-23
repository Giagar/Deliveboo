@extends('layouts.base')

@section('title','Home')

@section('content')
<div id="app">
<main class="container">
    <section class="section">
        <h2 class="text-center section-title">Seleziona una categoria</h2>
        <div class="d-flex flex-wrap justify-content-center categoriesSection">
            <div @click="selectedCategory(category)" v-for="(category, indexCategory) in categories" :key="indexCategory" :class="'categories text-center' + (selected === category.name ? ' active-category ' : '')">
                <img :src="category.img" alt="">
                <h4>@{{category.name}}</h4>
            </div>

        </div>
        {{-- @if (Request::route()->getName() == 'landing') --}}
        <form class="form-inline my-3 advanced-search">
            <input @keyup="filterByName()" class="form-control mr-sm-2" type="search" v-model="searchName" placeholder="Ricerca per nome" aria-label="Search" id="searchByName" name="searchByName">
            <input @keyup="filterByAddress()" class="form-control mr-sm-2" type="search" v-model="searchAddress" placeholder="Ricerca per indirizzo" aria-label="Search" id="searchByAdress" name="searchByAdress">
        </form>
        <div class="buttons-container">
            <button class="btn btn-dark btn-bg-black reset-btn" @click="showAll()">Reset</button>
        </div>
    {{-- @endif --}}
    </section>

    <h2 class="text-center section-title" style="margin-top: 20px">@{{selected === 'All' ? 'I nostri suggerimenti' : 'La tua ricerca'}}</h2>
    <section class="section d-flex flex-wrap justify-content-center restaurantsSection">
        <div class="search-indicator" v-if="searchResultsTitle !== '' && selected !== 'All'">
            @{{searchResultsTitle}}
            {{-- <div class="triangle-pointer">
                <div class="arrow-up"></div>
                <div class="arrow-down"></div>
                <div class="arrow-left"></div>
                <div class="arrow-right"></div>
            </div> --}}
        </div>

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
        {{-- <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="(restaurant, index) in restaurants" v-if="(selected === 'All') && index < maxRestaurantShown">
            <a :href="'/restaurants/' + restaurant.restaurant_name">
                <span>@{{restaurant.restaurant_name}}</span>
            </a> --}}
            {{-- <div v-for="category in restaurant.categories">
                <h5>@{{category.name}}</h5>
            </div> --}}
            {{-- </div>
                <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="(restaurant, index) in restaurants" v-if="(selected !== 'All')">
                    <a :href="'/restaurants/' + restaurant.restaurant_name">
                        <span>@{{restaurant.restaurant_name}}</span>
                    </a> --}}
                    {{-- <div v-for="category in restaurant.categories">
                        <h5>@{{category.name}}</h5>
                    </div> --}}
                    {{-- </div> --}}

                    {{-- prova --}}
                    <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="(restaurant, index) in restaurants" v-if="(selected !== 'All')">
                        <a :href="'/restaurants/' + restaurant.restaurant_name"></a>
                        <div class="restaurant-name">@{{restaurant.restaurant_name}}</div>
                        <div class="restaurant-categories">
                            <span v-for="category in restaurant.categories">@{{categoryIcons[category.name]}}</span>
                        </div>

                        {{-- <div v-for="category in restaurant.categories">
                            <h5>@{{category.name}}</h5>
                        </div> --}}
                    </div>


                    <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="(restaurant, index) in restaurants" v-if="(selected === 'All') && index < maxRestaurantShown">
                        <a :href="'/restaurants/' + restaurant.restaurant_name"></a>
                        <div class="restaurant-name">@{{restaurant.restaurant_name}}</div>
                        <div class="restaurant-categories">
                            <span v-for="category in restaurant.categories">@{{categoryIcons[category.name]}}&nbsp;</span>
                        </div>

                        {{-- <div v-for="category in restaurant.categories">
                            <h5>@{{category.name}}</h5>
                        </div> --}}
                    </div>

                    {{-- <div class="restaurants d-flex"  v-for="(restaurant, index) in restaurants" v-if="(selected === 'All') && index < maxRestaurantShown">
                        <a :href="'/restaurants/' + restaurant.restaurant_name">
                            <div class="restaurant-name">
                                <span>@{{restaurant.restaurant_name}}</span>
                            </div>
                            <div class="restaurant-img" :style="{'background-image':'url('+restaurant.img+')'}"></div>
                            <div class="restaurant-categories">categories</div>
                            {{-- <div v-for="category in restaurant.categories">
                                <h5>@{{category.name}}</h5>
                            </div> --}}
                            {{-- </a>
                            </div> --}}


                            {{-- /prova --}}

                            <div class="no-restaurants-found message" v-if="restaurantsFound === 0 && selected !== 'All'">
                                Mi dispiace, non ci sono ristoranti con le caratteristiche richieste
                            </div>
                            {{-- /versione nuova --}}


    </section>
    {{-- <section class="section inspire">
        <h2 class="text-center" style="margin-top: 20px">Lasciati ispirare, ordina e ricevi comodamente a casa tua!</h2>
    </section> --}}
</main>
</div>
<script src="{{ asset('js/app.js') }}"></script>

@endsection
