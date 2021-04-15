<nav style="background-image: linear-gradient(to right, red , yellow);" class="navbar navbar-expand-lg navbar-light bg-light py-3">
            <a class="navbar-brand" href="#">Deliveroo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                @if (!Auth::check())
                <li class="nav-item active">
                  <a class="nav-link" href="#">Link<span class="sr-only">(current)</span></a>
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                @endif
              </ul>
              @if (Request::route()->getName() == 'landing')
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 mr-sm-4" type="submit">Search</button>
              </form>
              @endif
              @if (!Auth::check())
                <a class="btn  mr-sm-1" href="/login">Login</a>
                <a class="btn"  href="/register">Register</a>
              @else
                <div class="btn" aria-labelledby="navbarDropdown">
                    <a style="color:red;text-decoration:none;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
              @endif
            </div>
          </nav>


