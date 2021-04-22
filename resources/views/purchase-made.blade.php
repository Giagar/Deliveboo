{{-- questo sarà la pagina dopo l'effettivo pagamento per comunicare che è andato bene --}}
@extends('layouts.base')

@section('title','Home')

@section('content')
<div class="">
Il tuo pagamento è avvenuto con successo.
Ti abbiamo inviato una mail con i dettagli del tuo ordine.
Grazie per aver ordinato su Deliveroo.
</div>
{{-- {{$transaction}}
{{$newOrder}} --}}

@endsection
