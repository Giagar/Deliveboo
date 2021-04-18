{{-- questo sarà il checkout page --}}

<html>
<body>
    <div id="carrello">
        {{-- Qui forse c'è un problema nell'usare due volte id carrello su due pagine diverse --}}
    <div v-for='dish in cart'>
          <span  @click='decreaseQuantity(dish)'>-</span>
          <span>@{{dish.quantity}}</span>
          <span  @click='increaseQuantity(dish)'>+</span>

        <span>@{{dish.item.name}}</span>
        <span>€ @{{(dish.item.price * dish.quantity).toFixed(2)}}</span>
      </div>

      <div>
        <span>Totale</span>
        <span>€ @{{calculateTotal}}</span>
      </div>

    <form action="{{ route('pay', $restaurant->restaurant_name) }}" id="payment-form" method="POST">
        @method('POST')
        @csrf
         <input type="text" name="customer_name" placeholder="name">
         <input type="text" name="customer_surname" placeholder="surname">
         <input type="text" name="customer_email" placeholder="email">
         <input type="text" name="customer_address" placeholder="address">
         {{-- per passare la quantità,il prezzo e il numero di piatti uso input di tipo hidden
         in quel modo poi lato backend avrò dalla request i dati che mi servono
         per associare gli ordini ai piatti, grazie alfredo per l'extra in boolpress --}}
         <input v-for ="dish in cart" type = "hidden" name = "dishes[]" :value = "dish.item.id"/>
         <input v-for ="dish in cart" type = "hidden" name = "quantity[]" :value = "dish.quantity"/>
         <input type = "hidden" name ="amount" :value = "calculateTotal" />
          <a @click='saveCart'>Torna indietro</a>
          <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
          </div>
          <div>
            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <button  v-if="calculateTotal !==0">Procedi al pagamento</button>
          </div>
      </form>
      </div>
      <script src="{{ asset('js/carrello.js') }}"></script>

      {{-- script braintree --}}
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
      {{-- fine script braintree --}}
      </body>
</html>

