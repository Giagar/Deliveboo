/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import axios from 'axios';
import Vue from 'vue';
window.Vue = Vue;
require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: function() {
        return {
            selected: 'All',
            onSearch: false,
            categories: [],
            restaurants: [],
            searchName: '',
            searchAddress: '',
            maxRestaurantShown: 9,
            restaurantsSearched: false, // prova
        }
    },
    mounted: function() {
        axios
            .get('api/categories')
            .then((response) => {
                this.categories = response.data;
            })

        axios
            .get('api/restaurants')
            .then((response) => {
                this.restaurants = response.data;
            })
    },
    methods: {
        selectedCategory(category) {
            this.selected = category.name; // aggiunto per limitare numero ristoranti visualizzati
            this.searchAddress = ""; // prova: azzere campo di ricerca per indirizzo
            this.searchName = ""; // prova: azzere campo di ricerca per nome
            this.onSearch = true;
            axios
                .get('api/categories/' + category.name)
                .then((response) => {
                    console.log('response', response.data == false)
                    this.restaurants = response.data;

                    // response.data == true
                    // ? (
                    //     this.restaurants = response.data,
                    //     this.restaurantsSearched = true
                    //     ) : (
                    //         this.restaurantsSearched = false
                    //         );
                })
        },
        filterByName() {
            this.searchAddress = ""; // prova: azzera campo ricerca per indirizzo
            axios
            .get('api/restaurants')
            .then((response) => {
                if(this.searchName) {
                        this.selected = "searchByName";
                        this.restaurants = response.data.filter(restaurants =>
                            (console.log("name activated", this.searchName, this.selected), restaurants.restaurant_name.toLowerCase().startsWith(this.searchName.toLowerCase()))
                            );
                    } else {
                        this.selected = 'All'; // aggiunto per limitare numero ristoranti visualizzati
                        this.restaurants = response.data;
                    }
                })
        },
        filterByAddress() {
            this.searchName = ""; // prova: azzera campo ricerca per nome
            axios
            .get('api/restaurants')
            .then((response) => {
                    this.selected = "searchByAddress";
                    if(this.searchAddress) {
                        this.restaurants = response.data.filter(restaurants =>
                            (console.log("address activated", this.selected), restaurants.address.toLowerCase().includes(this.searchAddress.toLowerCase()))
                            );
                    } else {
                        this.selected = 'All'; // aggiunto per limitare numero ristoranti visualizzati
                        this.restaurants = response.data;
                    }
                })

        },
        // prova: reset
        showAll() {
            this.selected = "All";
            this.searchName = "";
            this.searchAddress = "";
            axios
            .get('api/restaurants')
            .then((response) => {
                this.restaurants = response.data;
            })
        }
    }
});
