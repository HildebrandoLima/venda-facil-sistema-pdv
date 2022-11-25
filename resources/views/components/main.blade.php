<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'/>
        <script type="text/javascript" src={{ asset('js/exibirInput.js') }}></script>
        <script type="text/javascript" src={{ asset('js/menu.js') }}></script>
        <script type="text/javascript" src={{ asset('js/relogio.js') }}></script>
        <link rel="stylesheet" href="{{ asset('css/background-image.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/barra-vertical.css') }}" type="text/css">
        <script type="text/javascript" src={{ asset('js/scriptLoading') }}></script>
    </head>
    <body>

        <div class="container mt-3">
            @yield('body')
        </div>

        <footer class="fixed-bottom">
            <div class="container">
                @extends('components.loading')
                @extends('components.menu')
                @extends('components.modalabrircaixa')
                @extends('components.modalfecharcaixa')
                @extends('components.modalajuda')
                @extends('components.modaladicionarunidade')
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
