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
            restaurantsFound: 0, // flag per messaggio errore ricerca ristoranti
            searchResultsTitle: "", // titolo mostrato a seconda della ricerca fatta

            categoryIcons: {
                Americano: 'Am',
                Cinese: 'Ci',
                Coreano: 'Co',
                Giapponese: 'Gi',
                Indiano: 'In',
                Italiano: 'It',
                Messicano: 'Mes',
                Mediterraneo: 'Med',
                Street_food: 'SF',
                Sushi: 'Su',
                Thailandese: 'Th',
                Pasta: 'Pa',
                Pizza: 'Pi',
                Insalate: 'In',
                Kebab: 'Ke',
                Healthy: 'He',
                Hamburger: 'Ha',
                Dessert: 'De',
                Gelato: 'Ge',
                Caffetteria: 'Ca',
            }
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
            this.searchResultsTitle = "categoria"; // titolo dipendente dalla ricerca fatta
            this.onSearch = true;
            axios
                .get('api/categories/' + category.name)
                .then((response) => {

                    // messaggio di errore in caso di nessuna corrispondenza nei ristoranti
                    // noRestaurantsFound(response.data);
                    response.data.length === 0
                    ? this.restaurantsFound = 0
                    : this.restaurantsFound = 1;
                    // / messaggio di errore in caso di nessuna corrispondenza nei ristoranti

                    this.restaurants = response.data;

                })
        },
        filterByName() {
            this.searchAddress = ""; // prova: azzera campo ricerca per indirizzo
            this.searchResultsTitle = "nome"; // titolo dipendente dalla ricerca fatta
            axios
            .get('api/restaurants')
            .then((response) => {
                if(this.searchName) {
                        this.selected = "searchByName";
                        this.restaurants = response.data.filter(restaurants =>
                            (console.log("name activated", this.searchName, this.selected), restaurants.restaurant_name.toLowerCase().startsWith(this.searchName.toLowerCase()))
                        );

                        // noRestaurantsFound(this.restaurants);
                        this.restaurants.length === 0
                        ? this.restaurantsFound = 0
                        : this.restaurantsFound = 1;
                    } else {
                        this.selected = 'All'; // aggiunto per limitare numero ristoranti visualizzati
                        this.restaurants = response.data;
                    }
                })
        },
        filterByAddress() {
            this.searchName = ""; // prova: azzera campo ricerca per nome
            this.searchResultsTitle = "indirizzo"; // titolo dipendente dalla ricerca fatta
            axios
            .get('api/restaurants')
            .then((response) => {
                    this.selected = "searchByAddress";
                    if(this.searchAddress) {
                        this.restaurants = response.data.filter(restaurants =>
                            (console.log("address activated", this.selected), restaurants.address.toLowerCase().includes(this.searchAddress.toLowerCase()))
                        );

                        // noRestaurantsFound(this.restaurants);
                        this.restaurants.length === 0
                        ? this.restaurantsFound = 0
                        : this.restaurantsFound = 1;
                    } else {
                        this.selected = 'All'; // aggiunto per limitare numero ristoranti visualizzati
                        this.restaurants = response.data;
                    }
                })

        },

        // noRestaurantsFound(restaurantsSearchedResults) {
        //     restaurantsSearchedResults.length === 0
        //     ? this.restaurantsFound = 0
        //     : this.restaurantsFound = 1;
        // }

        // prova: reset
        showAll() {
            this.selected = "All";
            this.searchName = "";
            this.searchAddress = "";
            this.searchResultsTitle = "";
            axios
            .get('api/restaurants')
            .then((response) => {
                this.restaurants = response.data;
            })
        }
    }
});
