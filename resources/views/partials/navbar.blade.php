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
                    <a class="nav-link" href="{{ route('home') }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('client.conferences') }}">
                        {{ __('Client') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.conferences') }}">
                        {{ __('Employee') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        {{ __('Admin') }}
                    </a>
                </li>
            </ul>

            {{-- Logout (disabled) --}}
            <form class="d-flex">
                <button class="btn btn-outline-secondary me-2" type="button" disabled>
                    {{ __('Logout') }}
                </button>
                <span class="navbar-text">
                    {{ __('Name Surname') }}
                </span>
            </form>
        </div>
    </div>
</nav>
