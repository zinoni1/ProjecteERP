@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('productes.editarCategoria') }}</h1>
                </div>
                <div class="card-body">
                    <!-- Formulario para editar la categoría -->
                    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="categoria" class="form-label">{{ __('productes.nom') }}</label>
                            <input type="text" class="form-control" id="categoria" name="Categoria" value="{{ $categoria->Categoria }}">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <a href="{{ route('mostrarProductos') }}" class="btn btn-secondary me-2">{{ __('productes.tornar') }}</a>
                                <button type="submit" class="btn btn-primary me-2">{{ __('productes.editarCategoria') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-4 text-white">{{ __('productes.productesCategoria') }} {{ $categoria->Categoria }}</h2>
@if ($categoria->productes->isNotEmpty())
<div class="table-responsive mt-3">
    <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400 border border-gray-300 bg-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4"></th>
                <th scope="col" class="px-4 py-3">{{ __('productes.nom') }}</th>
                <th scope="col" class="px-4 py-3">{{ __('productes.descripcio') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoria->productes as $producto)
            <tr onclick="window.location='{{ route('producte.show', $producto) }}';" style="cursor: pointer;" class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="w-4 px-4 py-3"></td>
                <td class="px-4 py-2">{{ $producto->Nombre }}</td>
                <td class="px-4 py-2">{{ $producto->Descripcion }}</td>
            </tr><tr class="border-t border-gray-200 dark:border-gray-600"></tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p class="mt-3 text-white">{{ __('productes.NoProductes') }}</p>
@endif
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
