{{-- questo sarà il checkout page --}}

<html>
<body>
    <form action="{{ route('pay', $restaurant->restaurant_name) }}" id="payment-form" method="POST">
        @method('POST')
        @csrf
         <input type="text" name="customer_name" placeholder="name">
         <input type="text" name="customer_surname" placeholder="surname">
         <input type="text" name="customer_email" placeholder="email">
         <input type="text" name="customer_address" placeholder="address">
          <a>Torna indietro</a>
          <input id="nonce" name="payment_method_nonce" type="hidden" />
          <button >Procedi al pagamento</button>

      </form>

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
      </body>
</html>
