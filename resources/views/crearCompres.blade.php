@extends('master')

@section('content')
<div class="container">
    <h1>Crear Nueva Compra</h1>
    <h3>Si necesitas un producto nuevo, primero crea el producto y después la compra</h3>
    <form action="{{ route('compras.store') }}" method="POST" id="compraForm">
        @csrf
        <div class="form-group">
            <label for="fechaCompra">Fecha de Compra:</label>
            <input type="datetime-local" class="form-control" id="fechaCompra" name="fechaCompra" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d\TH:i') }}" readonly>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" class="form-control" id="cantidad" name="Cantidad" required>
        </div>
        <div class="form-group">
            <label for="user">Usuario:</label>
            <input type="text" class="form-control" id="user" name="user" value="{{ $user->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="vendedor">Vendedor:</label>
            <select class="form-control" id="vendedor" name="vendedor_id" required>
                <option value="">Seleccione un vendedor</option>
                @foreach($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}">{{ $vendedor->NombreVendedor }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="producto">Producto:</label>
            <select class="form-control" id="producto" name="producte_id" required>
                <option value="">Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="button" class="btn btn-success" onclick="agregarProducto()">Agregar Producto</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <a href="{{ route('productes.createCompraProducte') }}"  class="btn btn-primary">Crear Nuevo Producto</a>
</div>

<script>
    function agregarProducto() {
        var form = document.getElementById('compraForm');
        var divNuevoProducto = document.createElement('div');
        divNuevoProducto.innerHTML = `
            <div class="form-group">
                <label for="nombre_producto" class="form-label">Nombre del Producto:</label>
                <select name="nombre_producto[]" class="form-control" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Por favor, seleccione un producto.
                </div>
            </div>
            <div class="form-group">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" name="cantidad[]" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor, ingrese la cantidad del producto.
                </div>
            </div>
        `;
        form.insertBefore(divNuevoProducto, form.lastElementChild.previousElementSibling);
    }
</script>

@endsection
