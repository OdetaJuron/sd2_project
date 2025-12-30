<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">

        <a class="navbar-brand ms-3" href="{{ route('home') }}">
            {{ __('Conference system') }}
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="{{ __('nav.toggle_navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- links to user types --}}
            <ul class="navbar-nav ms-3 me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.conferences') }}">{{ __('Client') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.conferences') }}">{{ __('Employee') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Admin') }}</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">

                @guest
                    <a class="btn btn-outline-primary me-2" href="{{ url('/login') }}">
                        {{ __('Login') }}
                    </a>
                    <a class="btn btn-primary" href="{{ url('/register') }}">
                        {{ __('Register') }}
                    </a>
                @endguest

                @auth
                    <span class="navbar-text me-3">
                         {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ url('/logout') }}" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-secondary" type="submit">
                            {{ __('Logout') }}
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</nav>
