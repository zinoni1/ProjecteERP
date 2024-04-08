@extends('master')
@section('content')

    <div class="content">
        <div class="form-container">
            <h1 class="text-center mb-4">Crear Nou Producte</h1>

            <form action="{{ route('productes.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nom:</label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                    <div class="invalid-feedback">
                        Si us plau, introdueix un nom.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripció:</label>
                    <textarea name="Descripcion" id="Descripcion" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        Si us plau, introdueix una descripció.
                    </div>
                </div>

                <div class="mb-3">
    <label for="Categoria" class="form-label">Categoría:</label>
    <select name="categoria_id" id="Categoria" class="form-control" required>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}">{{ $categoria->Categoria }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">
        Si us plau, introdueix una categoria.
    </div>
</div>




                <div class="mb-3">
                    <label for="Precio" class="form-label">Preu:</label>
                    <input type="number" name="Precio" id="Precio" class="form-control" step="0.01" required>
                    <div class="invalid-feedback">
                        Si us plau, introdueix un preu.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Stock" class="form-label">Stock:</label>
                    <input type="number" name="Stock" id="Stock" class="form-control" required>
                    <div class="invalid-feedback">
                        Si us plau, introdueix un stock.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="FechaEntrada" class="form-label">Data d'entrada:</label>
                    <input type="date" name="FechaEntrada" id="FechaEntrada" class="form-control" required>
                    <div class="invalid-feedback">
                         Si us plau, introdueix una data d'entrada.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="imagen">Imatge del producte:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/jpg, image/jpeg, image/png">
                </div>

                <a href="{{ route('products') }}" class="btn btn-secondary mt-3">Volver</a>
                <button type="submit" class="btn btn-primary btn-block">Guardar Producte</button>

            </form>
        </div>
    </div>

@endsection
