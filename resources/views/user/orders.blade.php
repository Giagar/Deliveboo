@extends('layouts.baseuser')

@section('title','Dashboard')

@section('content')
{{-- @dd($processedOrders) --}}
<div class="receipt-container">
@foreach ($processedOrders as $order)

<div class="receipt">

    <div class="logo">
        <img src="{{asset('images/logo.jpg')}}" alt="">
    </div>

    <div class="info">
        <h3>Info Cliente</h3>
        <p>
            Nome          : {{$order['info']->customer_name}}</br>
            Cognome       : {{$order['info']->customer_surname}}</br>
            Indirizzo     : {{$order['info']->customer_address}}</br>
            Email         : {{$order['info']->customer_email}}</br>
            Ordinato il   : {{$order['info']->created_at}}</br>
        </p>
    </div>

        <div id="table">
            <table class="table">
                <thead class="header-table">
                    <tr>
                        <th scope="col">Prodotto</th>
                        <th scope="col">Quantità</th>
                        <th scope="col">Subtotale</th>
                    </tr>
                </thead>
                <tbody>
               @foreach ($order['items'] as $key=>$item)
               <tr>
                <td>{{$key}}</td>
                <td>{{$item['quantita']}}</td>
                <td>{{$item['subtotale']}} €</td>
               </tr>
               @endforeach
               <tr class="total">
                <td></td>
                <td></td>
                <td><b>Totale : {{$order['grandTotal']}} €</b></td>
            </tr>
        </tbody>


                    {{-- @foreach ($order->dishes()->get()->toArray() as $dish)
                    @php
                    $dishesforOrder= (array_count_values(array_map(function($item) {
                   return $item['name']['price'] ;
                     }, $order->dishes()->get()->toArray())));
                    @endphp
                    @endforeach
                    @foreach ($dishesforOrder as $dishName=>$dishQuantity)
                    <tr>
                    <td>{{$dishName}}</td>
                    <td>{{$dishQuantity}}</td>
                </tr>
                    @endforeach
                    <tr class="total">
                        <td></td>
                        <td><b>Totale : {{collect($order->dishes)->sum('price')}} €</b></td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
</div>
@endforeach
</div>

@endsection
