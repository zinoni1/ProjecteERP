@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <div class="card">
                <div class="card-header">{{ __('traduccion.afegirclient') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('clientes.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">{{ __('traduccion.nom') }}</label>
                            <input type="text" id="nombre" name="nombre" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">{{ __('traduccion.cognom') }}</label>
                            <input type="text" id="apellido" name="apellido" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('traduccion.correu') }}</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">{{ __('traduccion.telefon') }}</label>
                            <input type="text" id="telefono" name="telefono" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">{{ __('traduccion.adreca') }}</label>
                            <input type="text" id="direccion" name="direccion" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="poblacion" class="form-label">{{ __('traduccion.poblacio') }}</label>
                            <input type="text" id="poblacion" name="poblacion" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('traduccion.guardarclient') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    margin-bottom: 1.5rem;
}

.card-header {
    background-color: #4a5568;
    color: #ffffff;
    padding: 0.75rem 1.25rem;
    border-bottom: 1px solid #e2e8f0;
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
}

.card-body {
    padding: 1.25rem;
}

.form-label {
    font-weight: 600;
}

.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #4a5568;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #cbd5e0;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn-primary {
    color: #ffffff;
    background-color: #4a5568;
    border-color: #4a5568;
}

.btn-primary:hover {
    color: #ffffff;
    background-color: #2d3748;
    border-color: #1a202c;
}

</style>
@endsection
