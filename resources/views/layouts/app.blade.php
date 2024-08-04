<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/bootstrap.bundle.min.js') }}">

    {{-- family  --}}

    <link rel="icon" href="{{ asset('images/img/logos/TaskJobs.png') }}"  sizes="16x16">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;1,200;1,500&display=swap"
        rel="stylesheet">
        {{-- <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" /> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <title>TaskJobs</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- css  --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('link-css')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        {{-- @include('layouts.navigation') --}}

        {{-- start navbar --}}
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid container-link">
                {{-- <div class="navbar-brand logo">
                    <img src="{{ asset('images/img/logos/TaskJobs.png') }}" alt="TASKJOBS LOGO">
                </div> --}}

                @guest
                    <a href="{{ route('HOME') }}">
                        <div class="navbar-brand logo">
                            <img style="width: 100%; height: 50px;" src="{{ asset('images/img/logos/TaskJobs.png') }}" alt="TASKJOBS LOGO">
                        </div>
                    </a>
                @endguest

                @auth
                    <ul class="d-flex links active">
                        <li><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    </ul>
                @endauth

                <div class="links-bar">
                    <ul class="d-flex links active">
                        <li><a href="#">Locations </a></li>
                        <li><a href="{{ route('services.index') }}">Services </a></li>

                        @auth
                            <li><button> <a style="color:red; border:1px solid black; border-radius:12px; padding:5px;" onclick="logout()">Se déconnecter </a></button></li>
                        @if (Auth()->user()->tacheur)
                            <span style="color: blue">   <li><a href="#">{{Auth()->user()->tacheur->solde}} DH </a></li> </span>
                        @elseif (Auth()->user()->client)
                            <span style="color: blue">   <li ><a href="#">{{Auth()->user()->client->point }} point </a></li> </span>
                        @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                </form>
                            </li>
                        @endauth

                        @guest
                            <li>
                                <a href="{{ route('createClient') }}">S'inscrire </a> / <a href="{{ route('login') }}"> Connexion</a>
                            </li>
                            <li><a class="button" href="{{ route('createtacheur') }}">Devenez un Tâcheur</a></li>
                        @endguest

                    </ul>
                </div>
                <div class="menu-toggle" onclick="active()">&#9776;</div>
            </div>
        </nav>
        {{-- end navbar  --}}



        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->

        <div>
            @yield('content')
        </div>

        {{-- <main>
            {{ $slot }}
        </main> --}}
    </div>
    <script>
        function logout() {
            event.preventDefault();
                document.getElementById('logout-form').submit();
        }
    </script>
              <script>
                var win = navigator.platform.indexOf('Win') > -1;
                if (win && document.querySelector('#sidenav-scrollbar')) {
                  var options = {
                    damping: '0.5'
                  }
                  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
                }
              </script>

              <!-- Github buttons -->
              <script async defer src="https://buttons.github.io/buttons.js"></script>
              <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
              <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
              <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
              <script>
                AOS.init();
              </script>
</body>

</html>
