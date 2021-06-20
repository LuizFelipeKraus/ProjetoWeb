<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BLLW Game Store') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link rel="icon" href="{{ url('storage/img/bllw_fav.png')}}" sizes="32x32" type="image/png"/>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('storage/img/bllw_branco.png')}}" width="20px" alt="">
                </a>
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
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-4">

                <div class="card bg-dark text-dark  text-center">
                    <img height="125px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6vHF76aMvR833bPfknqe8JedOJBZN_hjKxg&usqp=CAU" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <a href="{{route('view_listar_auth')}}" class="btn btn-light btn-block mt-4">Lista de Usuários</a>
                    </div>
                </div>

                <div class="card bg-dark text-dark  text-center">
                    <img height="125px" src="https://cdn.cgn.inf.br/cgn-cdn/fotos-cgn/2020/08/27161304/Série-GDLK.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <a href="{{route('view_listar_categoria')}}" class="btn btn-light btn-block mt-4">Lista de Categoria Jogos</a>
                    </div>
                </div>

                <div class="card bg-dark text-dark  text-center">
                    <img height="125px" src="https://tecnoblog.net/meiobit/wp-content/uploads/2017/11/20171124games.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <a href="{{route('view_listar_plataforma')}}" class="btn btn-light btn-block mt-4">Lista de Plataformas de Jogos</a>
                    </div>
                </div>

                <div class="card bg-dark text-dark  text-center">
                    <img height="125px" src="https://geek360.com.br/wp-content/uploads/2018/12/melhores-jogos-para-pc.jpg " class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <a href="{{route('view_listar_produto')}}" class="btn btn-light btn-block mt-4">Lista de Produto</a>
                    </div>
                </div>

                <div class="card bg-dark text-dark  text-center">
                    <img height="125px" src="https://upis.br/blog/wp-content/uploads/2019/05/geografia-o-que-e-estuda-saiba-toda-historia.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <a href="{{route('view_listar_estado')}}" class="btn btn-light btn-block mt-4">Lista de Estados</a>
                    </div>
                </div>
                
                <div class="card bg-dark text-dark text-center">
                    <img height="125px" src="https://arteref.com/wp-content/uploads/2016/04/qqqqqqqqqqqqq.png" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <a href="{{route('view_listar_cidade')}}" class="btn btn-light btn-block mt-4">Listas de Cidade</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
