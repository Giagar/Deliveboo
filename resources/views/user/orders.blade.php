Ordini

@foreach ($dishes as $dish)
 {{$dish->name}}
@foreach ($dish->orders as $order )
  {{$order->customer_name}}
  {{$order->customer_surname}}
@endforeach
@endforeach
