@extends('master')

@section('body')
        <div class="container">
    <div class="row justify-content-center">
  
        <div class="col-md-8">
        <br>
            <div class="card">
                <div class="card-header">{{ __('Añadir Cliente') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clientes.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="text" id="telefono" name="telefono" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" id="direccion" name="direccion" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="poblacion" class="form-label">Poblacion:</label>
                            <input type="text" id="poblacion" name="poblacion" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
