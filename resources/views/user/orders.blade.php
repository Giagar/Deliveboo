Dashboard

{{$user->name}}
<img src="{{asset($user->img)}}" alt="">

{{-- uno rimanda alla index della crude per cui entriamo nella crude del piatto
    un altro alla lista ordini un altro al grafico statistiche--}}

    <a href="{{route('dishes.index')}}">Vai ai piatti</a>
    {{-- partendo dalla index --}}
    <a href="{{route('orders')}}">Vai agli ordini</a>

    <a href="{{route('statistics')}}">Vai alle statistiche</a>







