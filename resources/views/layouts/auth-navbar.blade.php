<nav class="navbar navbar-expand-lg navbar-light py-3">

    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <img src="{{ asset('images-websites/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    </li>
            </ul>
            @if (!Auth::check())
                <a class="btn btn-dark btn-bg-black  mr-sm-1 my-btn-login" href="/login">Accedi</a>
                <a class="btn btn-light my-btn-register" href="/register">Registrati</a>
            @else
                <div aria-labelledby="navbarDropdown">
                   @if(Request::route()->getName() !=='dashboard')
                   <a class=" btn-bg-black btn-dark btn my-btn-dashboard" href="{{ route('dashboard') }}">Dashboard</a>
                   @endif
                    <a class="btn btn-light my-btn-login" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Esci') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endif
        </div>
    </div>
</nav>
