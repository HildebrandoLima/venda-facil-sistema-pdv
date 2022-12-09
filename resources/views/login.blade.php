@extends('components.main')

@section('title', 'Login')

@section('body')

@endsection

<img src="{{ asset('images/logo.png') }}" width="800" height="300" class="mt-3"/>

<div class="card shadow rounded mt-5 w-25 p-3">
    <div class="card-body">
        @if (session('msg'))
        <div class="alert alert-success mt-3" role="alert">
            <h3 class="text-center">{{ session('msg') }}</h3>
        </div>
        @endif

        <h3 class="text-center">Login</h3>

        <form action="{{ route('logar') }}" method="post" class="row g-3 needs-validation mt-3" novalidate >
        @csrf
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Matrícula</label>
                <input type="text" name="matricula" class="form-control" id="validationCustom01" placeholder="Matrícula" autofocus required />
                <div class="invalid-feedback">
                    Matrícula é obrigatória.
                </div>
            @if (session('error'))
                <p class="text-danger">Matrícula {{ session('error') }}</p>
            @endif
            </div>
            <div class="mb-3">
                <label for="validationCustom02" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="validationCustom02" placeholder="Senha" />
                <div class="invalid-feedback">
                    Senha é obrigatória.
                </div>
                @if (session('error'))
                    <p class="text-danger">Senha {{ session('error') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-success">
                <span class="icon fa fa-check"></span>
                Entrar
            </button>
        </form>
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