@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Editar Categoría</h1>
                </div>
                <div class="card-body">
                    <!-- Formulario para editar la categoría -->
                    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Nom de la categoría:</label>
                            <input type="text" class="form-control" id="categoria" name="Categoria" value="{{ $categoria->Categoria }}">
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <a href="{{ route('mostrarProductos') }}" class="btn btn-secondary me-2">Volver</a>
                                <button type="submit" class="btn btn-primary me-2">Guardar canvis</button>
                            </div>
                            <!-- Botón para eliminar la categoría -->
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar categoría</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-4 text-white">Productes de la categoría: {{ $categoria->Categoria }}</h2>
    @if ($categoria->productes->isNotEmpty())
    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Descripció</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoria->productes as $producto)
                <tr>
                    <td onclick="window.location='{{ route('producte.show', $producto) }}';" style="cursor: pointer;">{{ $producto->Nombre }}</td>
                    <td onclick="window.location='{{ route('producte.show', $producto) }}';" style="cursor: pointer;">{{ $producto->Descripcion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="mt-3 text-white">No hi ha productes en aquesta categoría.</p>
    @endif
</div>
@endsection