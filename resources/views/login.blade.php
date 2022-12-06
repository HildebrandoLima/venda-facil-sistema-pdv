<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">	
        <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'/>
        <script type="text/javascript" src={{ asset('js/test.js') }}></script>
        <link rel="stylesheet" href="{{ asset('css/background-image.css') }}" type="text/css">
        <title>Login</title>
    </head>
    <body>

        <div class="container mt-3">
            @if (session('msg'))
            <div class="alert alert-success mt-3" role="alert">
                <h3 class="text-center">{{ session('msg') }}</h3>
            </div>
            @endif

            <div class="row mt-3">
                <div class="col">
                    <img src="{{ asset('images/logo.png') }}" width="550" height="350" class=""/>
                </div>
                <div class="col mt-3">
                    <form action="{{ route('logar') }}" method="post" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Matrícula</label>
                            <input type="text" name="matricula" placeholder="Matrícula" class="form-control" id="validationCustom01" autofocus required />
                            <div class="invalid-feedback">
                                Matrícula é obrigatória.
                            </div>
                            <p class="text-danger">{{ session('error') }}</p>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Senha</label>
                            <input type="password" name="senha" placeholder="Senha" id="validationCustom02" class="form-control" required />
                            <div class="invalid-feedback">
                                Senha é obrigatória.
                            </div>
                            <p class="text-danger">{{ session('error') }}</p>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">
                                <span class="icon fa fa-check"></span>
                                Entrar
                            </button>
                        </div>
                      </form>
                </div>
            </div>
        </div>

    <script>
    (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>