@extends('supervisor.components.main')

@section('title', 'Dashboard | Venda Fácil - PDV')

@section('body')

<div class="card">
    <div class="card-body">
        {{ session('msg') }}
        <h4>DASHBOARD</h4>
        <hr />
    </div>
</div>

@endsection