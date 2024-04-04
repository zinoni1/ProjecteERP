@extends('master')

@section('content')
<div class="container mt-4">
    <div class="alert alert-danger" role="alert">
    Tu usuario con rol de venta solo puede acceder al módulo de venta.
    </div>
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Anar al Dashboard</a>
</div>
@endsection
