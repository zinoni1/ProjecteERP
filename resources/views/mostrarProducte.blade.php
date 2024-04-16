@extends('master')

@section('content')

        <div class="card">
        <div class= "card-header">
        <h1>{{ __('productes.detallsProducte') }}</h1>
        </div>
            <div class="card-body">
            <form action="{{ route('productes.update', $producte->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="nombre">{{ __('productes.nom') }}:</label>
                        <input type="text" class="form-control" id="nombre" name="Nombre" value="{{ $producte->Nombre }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion">{{ __('productes.descripcio') }}</label>
                        <textarea class="form-control" id="descripcion" name="Descripcion">{{ $producte->Descripcion }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria">{{ __('productes.categoria') }}</label>
                        <select class="form-control" id="categoria" name="categoria_id">
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ $producte->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->Categoria }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    
                    <div class="form-group">
                        <label for="precio">{{ __('productes.preu') }}</label>
                        <input type="number" class="form-control" id="precio" name="Precio" value="{{ $producte->Precio }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="stock">{{ __('productes.stock') }}</label>
                        <input type="number" class="form-control" id="stock" name="Stock" value="{{ $producte->Stock }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_entrada">{{ __('productes.dataEntrada') }}</label>
                        <input type="date" class="form-control" id="fecha_entrada" name="FechaEntrada" value="{{ $producte->FechaEntrada }}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">{{ __('productes.guardar') }}</button>
                </form>

                <form action="{{ route('productes.destroy', $producte->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mr-2">{{ __('productes.eliminar') }}</button>
                </form>

                <a href="{{ route('mostrarProductos') }}" class="btn btn-secondary mt-3">{{ __('productes.tornar') }}</a>
            </div>
        </div>
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
