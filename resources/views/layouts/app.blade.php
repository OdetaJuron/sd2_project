<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title', __('app.title'))</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('simple-sidebar/assets/favicon.ico') }}" />

    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="{{ asset('simple-sidebar/css/styles.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="d-flex" id="wrapper">

    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">
            {{ __('Conference system') }}
        </div>

        <div class="list-group list-group-flush">



            {{-- CLIENT --}}
            @if (request()->routeIs('client.*'))
                <div class="list-group-item bg-light fw-bold">
                    {{ __('Client') }}
                </div>

                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{ route('client.conferences') }}">
                    {{ __('Conferences') }}
                </a>

                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{ route('client.conferences.registrations') }}">
                    {{ __('Registrations') }}
                </a>
            @endif

            {{-- EMPLOYEE --}}
            @if (request()->routeIs('employee.*'))
                <div class="list-group-item bg-light fw-bold">
                    {{ __('Employee') }}
                </div>

                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{ route('employee.conferences') }}">
                    {{ __('Conferences') }}
                </a>
            @endif

            {{-- ADMIN  --}}
            @if (request()->routeIs('admin.*'))
                <div class="list-group-item bg-light fw-bold">
                    {{ __('Admin') }}
                </div>

                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{ route('admin.dashboard') }}">
                    {{ __('Dashboard') }}
                </a>

                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{ route('admin.users.index') }}">
                    {{ __('Users') }}
                </a>

                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                href="{{ route('admin.conferences.index') }}">
                    {{ __('Conferences') }}
                </a>
            @endif


        </div>
    </div>


        <!-- Page content wrapper-->
        <div id="page-content-wrapper">

            @include('partials.navbar')

            <!-- Page content-->
            <div class="container-fluid">
                <h1 class="mt-4">@yield('page_title')</h1>

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('simple-sidebar/js/scripts.js') }}"></script>
</body>
</html>
