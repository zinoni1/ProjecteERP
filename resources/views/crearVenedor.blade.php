<!-- resources/views/cuestionario.blade.php -->

@extends('master')

@section('content')
    <div class="container">
        <h1>Cuestionario</h1>
        <form method="POST" action="{{ route('venedors.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombreVendedor">Nombre del Vendedor</label>
                <input type="text" class="form-control" id="nombreVendedor" name="nombreVendedor">
            </div>
            <div class="form-group">
                <label for="Direccion">Dirección</label>
                <input type="text" class="form-control" id="Direccion" name="Direccion">
            </div>
            <div class="form-group">
                <label for="Telefono">Teléfono</label>
                <input type="text" class="form-control" id="Telefono" name="Telefono">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
