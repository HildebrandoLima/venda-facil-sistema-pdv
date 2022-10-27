<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
        <!-- <script type="text/javascript" src={{ asset('js/test.js') }}></script> -->
        <link rel="stylesheet" href="{{ asset('css/background-image.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/barra-vertical.css') }}" type="text/css">
    </head>
    <body>
        <div class="container mt-3">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="/home">Projeto simples com Laravel | SE</a>
                    @auth
                    <button class="btn btn-outline-secondary">
                        <a class="link-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </button>

                    <form action="/home" method="GET" class="d-flex">
                        <input type="text" name="search" id="search" class="form-control me-2" placeholder="Digite o Email" aria-label="Search" />
                        <button type="submit" class="btn btn-outline-success">Buscar</button>
                    </form>
                    @endauth

                    @guest
                    <a href="/login">Login</a>
                    @endguest
                </div>
            </nav>
        </div>

        <div class="container mt-3">
            @if(session('msg'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('msg') }}
            </div>
            @endif

            @yield('body')
        </div>

        <footer class="fixed-bottom">
            <div class="container">
                <button class="btn btn-primary">Finalizar Venda</button>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
