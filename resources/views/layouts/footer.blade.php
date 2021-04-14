
@if (Request::route()->getName() !== 'login' && Request::route()->getName() !== 'register' && Request::route()->getName() !== 'logout')

<footer>
questo sarà il footer che usando @ if Auth renderemo diverso tra utente pubblico e ristoratore
</footer>

@endif
