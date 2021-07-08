<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-JS4CL6YFGD"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-JS4CL6YFGD');

        </script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ url("storage/img/bllw_fav.png")}}" sizes="32x32" type="image/png" />

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ url("storage/img/bllw_branco.png")}}" width="25px" alt="">
                </a>
                <p class="text-center pt-3"><span class="grad"><strong>BLLW Game Store</strong></span></p>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Logar') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                        </li>
                        @endif
                        @else

                        <li class="nav-item ">
                            @if(Auth::user()->permissao == 1)
                        <li class="nav-item ">
                            <a href="{{route('view_adicionar_endereco')}}" class="nav-link">Endereço</a>
                        </li>
                        @if (!session()->has('carrinho'))
                        <a href="{{ route('carrinho') }}" class="nav-link">Carrinho</a>

                        @else
                        <a href="{{ route('carrinho') }}" class="nav-link">
                            <span class="badge bg-danger">{{ count(session('carrinho')) }}
                            </span>
                            Carrinho
                        </a>
                        @endif
                        @else
                        <li class="nav-item ">
                            <a href="{{route('view_adicionar_endereco')}}" class="nav-link">Endereço</a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{route('view_vendas')}}" class="nav-link">Compras</a>
                        </li>
                        @if (!session()->has('carrinho'))
                        <a href="{{ route('carrinho') }}" class="nav-link">Carrinho</a>

                        @else
                        <a href="{{ route('carrinho') }}" class="nav-link">
                            <span class="badge bg-danger">{{ count(session('carrinho')) }}
                            </span>
                            Carrinho
                        </a>
                        @endif
                        @endif
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->permissao == 1)
                                <a href="{{route('view_listar_auth')}}" class="dropdown-item">Admin</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            <div class="small text-center text-muted mt-5 mb-5">Copyright © 2021 - BLLW Games Store</div>
        </main>
    </div>
</body>

</html>
