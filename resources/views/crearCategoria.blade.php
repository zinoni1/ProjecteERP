@extends('master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Crear Nueva Categoría</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('productos.crear-categoria') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre de la Categoría:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"><br>
                            </div>
                            <div class="form-group">
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
