@extends('master')
@section('content')

    <div class="content">
        <div class="form-container">
            <h1 class="text-center mb-4">{{ __('productes.crearProducte') }}</h1>

            <form action="{{ route('productes.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="Nombre" class="form-label">{{ __('productes.nom') }}</label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                    <div class="invalid-feedback">
                    {{ __('productes.iNom') }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Descripcion" class="form-label">{{ __('productes.descripcio') }}</label>
                    <textarea name="Descripcion" id="Descripcion" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                    {{ __('productes.iDescripcio') }}
                    </div>
                </div>

                <div class="mb-3">
    <label for="Categoria" class="form-label">{{ __('productes.categoria') }}</label>
    <select name="categoria_id" id="Categoria" class="form-control" required>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->Categoria }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">
    {{ __('productes.iCategoria') }}
    </div>
</div>




                <div class="mb-3">
                    <label for="Precio" class="form-label">{{ __('productes.preu') }}</label>
                    <input type="number" name="Precio" id="Precio" class="form-control" step="0.01" required>
                    <div class="invalid-feedback">
                    {{ __('productes.iPreu') }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Stock" class="form-label">{{ __('productes.stock') }}</label>
                    <input type="number" name="Stock" id="Stock" class="form-control" required>
                    <div class="invalid-feedback">
                    {{ __('productes.iStock') }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="FechaEntrada" class="form-label">{{ __('productes.dataEntrada') }}</label>
                    <input type="date" name="FechaEntrada" id="FechaEntrada" class="form-control" required>
                    <div class="invalid-feedback">
                    {{ __('productes.iData') }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="imagen">{{ __('productes.imatge') }}</label>
                    <input type="file" id="imagen" name="imagen" accept="image/jpg, image/jpeg, image/png">
                </div>

                <a href="{{ route('products') }}" class="btn btn-secondary mt-3">{{ __('productes.tornar') }}</a>
                <button type="submit" class="btn btn-primary btn-block">{{ __('productes.guardar') }}</button>

            </form>
        </div>
    </div>

@endsection
