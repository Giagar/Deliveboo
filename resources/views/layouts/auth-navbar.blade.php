<nav class="navbar navbar-expand-lg navbar-light">

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
                @if (!Auth::check())
                    <li class="nav-item active">
                        {{-- <a class="nav-link" href="#">Link<span class="sr-only">(current)</span></a> --}}
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn-info btn" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                @endif
            </ul>

            @if (!Auth::check())
                <a class="btn btn-dark  mr-sm-1" href="/login">Login</a>
                <a class="btn btn-light" href="/register">Register</a>
            @else
                <div aria-labelledby="navbarDropdown">
                    <a {{-- style="color:#fff;text-decoration:none;" --}}class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endif
        </div>
    </div>
</nav>
