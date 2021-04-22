{{-- questo sarà la pagina dopo l'effettivo pagamento per comunicare che è andato bene --}}
@extends('layouts.base')

@section('title','Home')

@section('content')
<div style="min-height:70vh;padding-top:50px;padding-left:30px;">
<h2>Il tuo pagamento è avvenuto con successo.</h2>
<p>Ti abbiamo inviato una mail con i dettagli del tuo ordine.</p>
<p>Grazie per aver ordinato su Deliveroo.</p>
</div>
{{-- {{$transaction}}
{{$newOrder}} --}}

@endsection
