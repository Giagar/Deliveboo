@component('mail::message')
# Deliveroo.it

Grazie per aver acquistato su Deliveroo, {{$order->customer_name}} .


Il tuo ordine sarà spedito a {{$order->customer_address}}
nelle prossime ore.


Totale: {{$order->amount}}


From DeliverooTeam1
@endcomponent
