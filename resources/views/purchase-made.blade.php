{{-- questo sarà la pagina dopo l'effettivo pagamento per comunicare che è andato bene --}}
@extends('layouts.base')

@section('title','Home')

@section('content')
il tuo pagamento è avvenuto con successo

{{$transaction}}
{{$newOrder}}
Ti abbiamo spedito una mail al tuo indirizzo con i dettagli dell'ordine.
Grazie per aver ordinato su Deliveroo.
@endsection
