@extends('layouts.base')

@section('title','Home')

@section('content')

<main>
    <section class="d-flex flex-wrap justify-content-center">
        <div :style="{'background-image':'url('+category.img+')'}" class="text-center" @click="selectedCategory(category)" v-for="category in categories">
            <h4>@{{category.name}}</h4>
        </div>
    </section>

    <section class="d-flex flex-wrap justify-content-center">
        <div :style="{'background-image':'url('+restaurant.img+')'}" v-if="selected === 'All' || onSearch" v-for="restaurant in restaurants">
            <a :href="'/restaurants/' + restaurant.restaurant_name">
                <h4>@{{restaurant.restaurant_name}}</h4>
            </a>
            <div v-for="category in restaurant.categories">
                <h5>@{{category.name}}</h5>
            </div>
        </div>
    </section>
</main>

@endsection
