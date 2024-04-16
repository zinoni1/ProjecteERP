@extends('master')

@section('content')

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

/* Estilos para la vista previa de la imagen */
.image-preview-container {
    width: 100px; /* Ancho deseado */
    height: 100px;
    overflow: hidden;
}

.image-preview-image {
    width: 100%; /* 100% del contenedor */
    height: auto;
}
</style>

<div class="content">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">{{ __('productes.crearProducte') }}</div>
                <div class="card-body" >
                    <form action="{{ route('productes.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="Nombre" class="form-label">{{ __('productes.nom') }}</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                                <div class="invalid-feedback">
                                    {{ __('productes.iNom') }}
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="imagen">{{ __('productes.imatge') }}</label>
                                <input type="file" id="imagen" name="imagen" accept="image/jpg, image/jpeg, image/png" class="form-control" onchange="previewImage()"><br>
                                <!-- Contenedor de la vista previa -->
                            </div>
                            <div class="col-md-2">
                                <div class="image-preview-container">
                                    <div class="image-preview" id="imagePreview">
                                        <img src="" alt="Image Preview" class="image-preview-image" id="imagePreviewImage">
                                        <span class="image-preview-text">{{ __('productes.sinSeleccion') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="Descripcion" class="form-label">{{ __('productes.descripcio') }}</label>
                            <textarea name="Descripcion" id="Descripcion" class="form-control" required></textarea>
                            <div class="invalid-feedback">
                                {{ __('productes.iDescripcio') }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <label for="Precio" class="form-label">{{ __('productes.preu') }}</label>
                                <input type="number" name="Precio" id="Precio" class="form-control" step="0.01" required>
                                <div class="invalid-feedback">
                                    {{ __('productes.iPreu') }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="Stock" class="form-label">{{ __('productes.stock') }}</label>
                                <input type="number" name="Stock" id="Stock" class="form-control" required>
                                <div class="invalid-feedback">
                                    {{ __('productes.iStock') }}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="FechaEntrada" class="form-label">{{ __('productes.dataEntrada') }}</label>
                                <input type="date" name="FechaEntrada" id="FechaEntrada" class="form-control" required>
                                <div class="invalid-feedback">
                                    {{ __('productes.iData') }}
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('products') }}" class="btn btn-secondary mt-3">{{ __('productes.tornar') }}</a>
                            <button type="submit" class="btn btn-primary mt-3">{{ __('productes.guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        var preview = document.querySelector('#imagePreviewImage');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
        }
    }
</script>

@endsection
