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
    el: '#carrello',
    data: {
        cart: []
      },
      methods: {
        addToCart: function (dish) {
          for (let i = 0; i < this.cart.length; i++) {
            if (this.cart[i].item.id === dish.id) {
              this.cart[i].quantity++;
              return;
            }
          }
          this.cart.push({
            item: dish,
            quantity: 1
          });
          // console.log(this.cart);
        },
        increaseQuantity(dish) {
          dish.quantity++;
        },
        decreaseQuantity(dish) {
          dish.quantity--;
          if(dish.quantity <= 0) {
            this.removeProdFromCart(dish);
          }
        },
        removeProdFromCart(dish) {
          const prodIndex = this.cart.indexOf(dish);
          this.cart.splice(prodIndex, 1);
        },
        saveLocalStorage() {
            let parsed = JSON.stringify(this.cart);
            localStorage.setItem('cart', parsed);
          }
      },
      computed: {
        calculateTotal() {
          let total = 0;
          for (let i = 0; i < this.cart.length; i++) {
            total += this.cart[i].item.price * this.cart[i].quantity;
          }
          return total;
        }
      },
      mounted: function() {
        if(localStorage.getItem('cart')) {
          try {
            this.cart = JSON.parse(localStorage.getItem('cart'));
          } catch(e) {
            localStorage.removeItem('cart');
          }
        }
      }
    })
