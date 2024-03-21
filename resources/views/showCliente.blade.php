@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detalles del Cliente') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $cliente->Nombre }}">
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" value="{{ $cliente->Apellido }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $cliente->Email }}">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $cliente->Telefono }}">
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" value="{{ $cliente->Direccion }}">
                        </div>

                        <div class="mb-3">
                            <label for="poblacion" class="form-label">Poblacion:</label>
                            <input type="text" id="poblacion" name="poblacion" class="form-control" value="{{ $cliente->Poblacion }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
