@component('mail::message')
# Introduction

Grazie per aver acquistato su Deliveroo, {{$order->customer_name}}
Il tuo ordine sarà spedito a {{$order->customer_address}}
nelle prossime ore.

Totale: {{$order->amount}}
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

From DeliverooTeam1
@endcomponent
