@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('productes.crearCategoria') }}</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Categoria" class="form-label">{{ __('productes.nom') }}</label>
                            <input type="text" name="Categoria" id="Categoria" class="form-control" required>
                        </div>
                        <!-- Agrega más campos según sea necesario -->

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">{{ __('productes.crearCategoria') }}</button>
                            <a href="{{ route('mostrarProductos') }}" class="btn btn-secondary mt-3">{{ __('productes.tornar') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
