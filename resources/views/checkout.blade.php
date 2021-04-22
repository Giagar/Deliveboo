{{-- questo sarà il checkout page --}}
@extends('layouts.base')

@section('title','Home')

@section('content')

<div class="checkout-container">
    <div id="carrello" class="checkout"> {{-- Qui forse c'è un problema nell'usare due volte id carrello su due pagine diverse --}}
        <section class="cart">

    <!-- <div id="carrello" class="checkout" style="min-height:50vh;">
        {{-- Qui forse c'è un problema nell'usare due volte id carrello su due pagine diverse --}}
    <div v-for='dish in cart'>
          <span  @click='decreaseQuantity(dish)'>-</span>
          <span>@{{dish.quantity}}</span>
          <span  @click='increaseQuantity(dish)'>+</span> -->

            <div class="top-container">
                <div class="header-wrapper">
                    <div class="header-cart">
                        Controlla il tuo ordine
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
                    <button class="btn btn-warning">Torna ai piatti</button>
                </div>
                <div v-else class="total">
                    <h2>Totale</h2>
                    <h2>€ @{{ calculateTotal.toFixed(2) }}</h2>
                </div>
            </div>
        </section>

        <div class="mobile-checkout-cart">
            <section class="mobile-cart-section">
                <div class="mobile-cart-wrapper">
                    <div class="text-center">
                        <h5>Controlla il tuo ordine</h5>
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
            </section>
        </div>

    <form action="{{ route('pay', $restaurant->restaurant_name) }}" id="payment-form" method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
         <input type="text" class="form-control" name="customer_name" placeholder="Inserisci nome">
         <input type="text" class="form-control" name="customer_surname" placeholder="Inserisci cognome">
         <input type="email" class="form-control" name="customer_email" placeholder="Inserisci email">
         <input type="text" class="form-control" name="customer_address" placeholder="Inserisci indirizzo">
         <input type = "hidden" name = "amount" :value = "calculateTotal" />
         {{-- per passare la quantità e il numero di piatti uso input di tipo hidden
         in quel modo poi lato backend avrò dalla request i dati che mi servono
         per associare gli ordini ai piatti, grazie alfredo per l'extra in boolpress --}}
         <input v-for ="dish in cart" type = "hidden" name = "dishes[]" :value = "dish.item.id"/>
         <input v-for ="dish in cart" type = "hidden" name = "quantity[]" :value = "dish.quantity"/>
         </div>
          <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
          </div>
          <div>
            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button class="btn btn-warning" v-if="calculateTotal !==0">Procedi al pagamento</button>
          </div>
      </form>
      </div>
    </div>
      <script src="{{ asset('js/carrello.js') }}"></script>
      <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>
      <script>
          var form = document.querySelector('#payment-form');
          var client_token = "{{ $token }}";
          var onBox = $("#loading");
          onBox.addClass("not-active")
          braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            paypal: {
              flow: 'vault'
            }
          }, function (createErr, instance) {
            if (createErr) {
              console.log('Create Error', createErr);
              return;
            }
            form.addEventListener('submit', function (event) {
              onBox.removeClass('not-active').addClass('active-container').fadeIn('slow');
              event.preventDefault();
              instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                  onBox.removeClass('active-container').addClass('not-active').fadeIn('slow');
                  console.log('Request Payment Method Error', err);
                  return;
                }
                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
              });
            });
          });
      </script>
@endsection
