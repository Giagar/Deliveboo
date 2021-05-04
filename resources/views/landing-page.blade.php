@extends('layouts.base')

@section('title','Home')

@section('content')
<link rel="preconnect" href="https://fonts.gstatic.com">
<div id="app" class="landing-page">
    {{-- header --}}
    <header>
        <div class="header-content">
            <div class="header-promo-container">
                <h2 class="header-promo-variable">
                    Feeling lazy?
                    {{-- contenuto che varia automaticamente (headerPromoContent) --}}
                </h2>
                <div class="header-promo-fixed">
                    Compra da noi
                </div>
            </div>
        </div>
    </header>

    <main class="container">

        <section class="section">
            <div class="section-title-container">
                <h2 class="text-center section-title">Seleziona una categoria</h2>
            </div>


            <div class="d-flex justify-content-start categoriesSection">
                <div @click="selectedCategory(category)" v-for="(category, indexCategory) in categories" :key="indexCategory" :class="'categories text-center' + (selected === category.name ? ' active-category ' : '')">
                    <img :src="category.img" alt="">
                    <h4>@{{category.name}}</h4>
                </div>
            </div>


            {{-- @if (Request::route()->getName() == 'landing') --}}
            <form class="form-inline my-3 advanced-search">
                <input @keyup="filterByName()" class="form-control mr-sm-2" type="search" v-model="searchName" placeholder="Ricerca per nome" aria-label="Search" id="searchByName" name="searchByName">
                <input @keyup="filterByAddress()" class="form-control mr-sm-2" type="search" v-model="searchAddress" placeholder="Ricerca per indirizzo" aria-label="Search" id="searchByAdress" name="searchByAdress">
                <button class="btn reset-btn btn-bg-black" @click="showAll()">Azzera la ricerca</button>
            </form>
            {{-- @endif --}}
        </section>
        <div class="section-title-container">
            <h2 class="text-center section-title" style="margin-top: 20px">@{{selected === 'All' ? 'I nostri suggerimenti' : 'La tua ricerca'}}</h2>
        </div>
        <section class="section d-flex flex-wrap justify-content-center restaurantsSection">
            <div class="search-indicator" v-if="searchResultsTitle !== '' && selected !== 'All'">
                @{{searchResultsTitle}}
            </div>

            <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="(restaurant, index) in restaurants" v-if="(selected !== 'All')">
                <a :href="'/restaurants/' + restaurant.restaurant_name"></a>
                <div class="restaurant-name">@{{restaurant.restaurant_name}}</div>
                <div class="restaurant-categories">
                    <span v-for="category in restaurant.categories">#@{{category.name}}</span>
                </div>
            </div>

            <div class="restaurants d-flex" :style="{'background-image':'url('+restaurant.img+')'}" v-for="(restaurant, index) in restaurants" v-if="(selected === 'All') && index < maxRestaurantShown">
                <a :href="'/restaurants/' + restaurant.restaurant_name"></a>
                <div class="restaurant-name">@{{restaurant.restaurant_name}}</div>
                <div class="restaurant-categories">
                    <span v-for="category in restaurant.categories">#@{{category.name}}&nbsp;</span>
                </div>
            </div>

            <div class="no-restaurants-found message" v-if="restaurantsFound === 0 && selected !== 'All'">
                Ci dispiace, non ci sono ristoranti con le caratteristiche richieste
            </div>
        </section>

    </main>
</div>
<script src="{{ asset('js/app.js') }}"></script>

@endsection
