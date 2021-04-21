@extends('layouts.base')

@section('title','Dashboard')

@section('content')

{{-- soluzione  a --}}

{{-- @foreach ($dishes as $dish)
@foreach ($dish->orders as $order )
  {{$order->customer_name}}
  {{$order->customer_surname}}
@endforeach
@endforeach --}}


{{-- soluzione b che è meglio --}}
{{-- @dd($orders) --}}
<div class="receipt-container">
@foreach ($orders as $order)

<div class="receipt">

    <div class="logo">
        <img src="{{asset('images/logo.jpg')}}" alt="">
    </div>

    <div class="info">
        <h3>Info Cliente</h3>
        <p>
            Nome          : {{$order->customer_name}}</br>
            Cognome       : {{$order->customer_surname}}</br>
            Indirizzo     : {{$order->customer_address}}</br>
            Email         : {{$order->customer_email}}</br>
            Ordinato il   : {{$order->created_at}}</br>
        </p>
    </div>

        <div id="table">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Prodotto</th>
                        <th scope="col">Quantità</th>
                        <th scope="col">Subtotale</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->dishes as $dish)
                    <tr>
                        <td>{{$dish->name}}</td>
                        <td>1</td>
                        <td>€</td>
                    </tr>
                    @endforeach
                    <tr class="total">
                        <td></td>
                        <td><b>Totale</b></td>
                        <td><b>€</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
@endforeach
</div>

@endsection
