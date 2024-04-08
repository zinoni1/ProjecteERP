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
                    <!-- Formulario para eliminar la categoría -->
                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('productes.eliminar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-4 text-white">{{ __('productes.productesCategoria') }} {{ $categoria->Categoria }}</h2>
    @if ($categoria->productes->isNotEmpty())
    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">{{ __('productes.nom') }}</th>
                    <th scope="col">{{ __('productes.descripcio') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoria->productes as $producto)
                <tr onclick="window.location='{{ route('producte.show', $producto) }}';" style="cursor: pointer;">
                    <td>{{ $producto->Nombre }}</td>
                    <td>{{ $producto->Descripcion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="mt-3 text-white">{{ __('productes.NoProductes') }}</p>
    @endif
</div>
@endsection
