<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
        <link rel="stylesheet" href="{{asset('css/adminpage.css')}}" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="/.css/adminpage.css">
    <link rel="stylesheet" href="/public/css/adminpage.css">
    <link rel="icon" type="image/x-icon" href=".media/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@200&family=Reem+Kufi+Ink&display=swap"
        rel="stylesheet">

        <!-- Compiled and minified JavaScript -->

  <style>
        body {
            min-height: 100vh;
            margin: auto;
            display: flex;
            flex-direction: column;
            background-image: url("/image/fundo.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            align-items: center;
        }
    </style>
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

        <script type="module" src="{{asset('js/app.js')}}" async></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
