@extends('master')

@section('content')
    <div class="container">
        <h1>Detalles del Producto</h1>
        <div class="card">
            <div class="card-body">
            <form action="{{ route('productes.update', $producte->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="Nombre" value="{{ $producte->nombre }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="Descripcion">{{ $producte->Descripcion }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <input type="text" class="form-control" id="categoria" name="Categoria" value="{{ $producte->Categoria }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="Precio" value="{{ $producte->Precio }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="Stock" value="{{ $producte->Stock }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_entrada">Fecha de Entrada:</label>
                        <input type="date" class="form-control" id="fecha_entrada" name="FechaEntrada" value="{{ $producte->FechaEntrada }}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Guardar cambios</button>
                </form>

                <form action="{{ route('productes.destroy', $producte->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mr-2">Eliminar</button>
                </form>

                <a href="{{ route('mostrarProductos') }}" class="btn btn-secondary mt-3">Volver</a>
            </div>
        </div>
    </div>
@endsection
