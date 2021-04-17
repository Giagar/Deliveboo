{{-- soluzione  a --}}

{{-- @foreach ($dishes as $dish)
@foreach ($dish->orders as $order )
  {{$order->customer_name}}
  {{$order->customer_surname}}
@endforeach
@endforeach --}}


{{-- soluzione b che è meglio --}}

@foreach ($orders as $order)
{{$order->customer_name}}
@endforeach
