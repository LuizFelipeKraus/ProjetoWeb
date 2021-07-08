<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BLLW Game Store') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ url('storage/img/bllw_fav.png')}}" sizes="32x32" type="image/png" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Barra superior -->
        <div class="" id="sidebar-wrapper">
            <div class="sidebar-heading"> <a href="{{ route('home') }}"><img
                        src="{{ url('storage/img/Logoverticalpreta.png')}}" width="150" alt="">
                </a>
            </div>
            <div class="list-group list-group-flush ajusmenu">
                <a class="list-group-item list-group-item-action ajusmenu p-3"
                    href="{{route('view_listar_auth')}}">Lista de Usuários</a>
                <a class="list-group-item list-group-item-action ajusmenu p-3"
                    href="{{route('view_listar_categoria')}}">Lista de Categoria Jogos</a>
                <a class="list-group-item list-group-item-action ajusmenu p-3"
                    href="{{route('view_listar_plataforma')}}">Lista de Plataformas de Jogos</a>
                <a class="list-group-item list-group-item-action ajusmenu p-3"
                    href="{{route('view_listar_produto')}}">Lista de Produto</a>
                <a class="list-group-item list-group-item-action ajusmenu p-3"
                    href="{{route('view_listar_estado')}}">Lista de Estados</a>
                <a class="list-group-item list-group-item-action ajusmenu p-3"
                    href="{{route('view_listar_cidade')}}">Listas de Cidade</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Barra de navegacao lateral -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-outline-dark" id="sidebarToggle">Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->permissao == 1)
                                    <a class="dropdown-item" href="{{route('view_listar_auth')}}">Admin</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Conteudo da pagina -->
            <div class="container-fluid">

                @yield('content')



                <div class="small text-center text-muted mt-5 mb-5">Copyright © 2021 - BLLW Games Store</div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
