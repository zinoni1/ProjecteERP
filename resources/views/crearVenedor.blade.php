@extends('master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header  text-white">
                <h1 class="mb-0">{{ __('vendedor.cuestionario') }}</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('venedors.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombreVendedor" class="form-label">{{ __('vendedor.nombreVendedor') }}</label>
                        <input type="text" class="form-control" id="nombreVendedor" name="nombreVendedor">
                    </div>
                    <div class="mb-3">
                        <label for="Direccion" class="form-label">{{ __('vendedor.Direccion') }}</label>
                        <input type="text" class="form-control" id="Direccion" name="Direccion">
                    </div>
                    <div class="mb-3">
                        <label for="Telefono" class="form-label">{{ __('vendedor.telefono') }}</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('vendedor.enviar') }}</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        /* Pegar aquí el CSS personalizado del segundo formulario */

        .mb-3 {
            margin-bottom: 1.5rem;
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

        .card-header{
            margin-bottom: 0;
            color: #ffffff;
            background-color: #2d3748;
            border-color: #1a202c;
            
        }
    </style>
@endsection
