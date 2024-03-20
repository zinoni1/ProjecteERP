@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Crear Nova Categoría</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Categoria" class="form-label">Nom de la categoría:</label>
                            <input type="text" name="Categoria" id="Categoria" class="form-control" required>
                        </div>
                        <!-- Agrega más campos según sea necesario -->

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Crear Categoría</button>
                            <a href="{{ route('mostrarProductos') }}" class="btn btn-secondary mt-3">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
