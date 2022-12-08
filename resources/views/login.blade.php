@extends('components.main')

@section('title', 'Login')

@section('body')

@endsection

<div class="card shadow rounded mt-5 w-50 p-3">
    <div class="card-body">
        @if(session('msg'))
        <div class="alert alert-success mt-3" role="alert">
            <h3 class="text-center">{{ session('msg') }}</h3>
        </div>
        @endif

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