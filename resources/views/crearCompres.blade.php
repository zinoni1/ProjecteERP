@extends('master')

@section('content')
<div class="container">
    <h1>{{ __('Compras.new_create_purchase') }}</h1>
    <h3>{{ __('Compras.nuevo_producto_necesario') }}</h3>
    <form action="{{ route('compras.store') }}" method="POST" id="compraForm">
        @csrf
        <div class="form-group">
            <label for="fechaCompra">{{ __('Compras.fecha_compra') }}:</label>
            <input type="datetime-local" class="form-control" id="fechaCompra" name="fechaCompra" value="{{ \Carbon\Carbon::parse($date)->format('Y-m-d\TH:i') }}" readonly>
        </div>
        <div class="form-group">
            <label for="user">{{ __('Compras.usuario') }}:</label>
            <input type="text" class="form-control" id="user" name="user" value="{{ $user->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="vendedor">{{ __('Compras.vendedor') }}:</label>
            <select class="form-control" id="vendedor" name="vendedor_id" required>
                <option value="">{{ __('Compras.seleccionar_vendedor') }}</option>
                @foreach($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}">{{ $vendedor->NombreVendedor }}</option>
                @endforeach
            </select>
        </div>
        <div id="productos">
            <div class="producto">
                <div class="form-group">
                    <label for="producto" class="form-label">{{ __('Compras.product') }}:</label>
                    <select name="producte_id[]" class="form-control" required>
                        <option value="">{{ __('Compras.seleccionar_producto') }}</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        {{ __('Compras.seleccionar_producto_mensaje') }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="cantidad" class="form-label">{{ __('Compras.quantity') }}:</label>
                    <input type="number" name="cantidad[]" class="form-control" required>
                    <div class="invalid-feedback">
                        {{ __('Compras.ingresar_cantidad_mensaje') }}
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success" onclick="agregarProducto()">{{ __('Compras.agregar_producto') }}</button>
        <button type="submit" class="btn btn-primary">{{ __('Compras.guardar') }}</button>
    </form>
    <a href="{{ route('productes.createCompraProducte') }}"  class="btn btn-primary">{{ __('Compras.crear_nuevo_producto') }}</a>
</div>

<script>
    function agregarProducto() {
        var productosDiv = document.getElementById('productos');
        var divNuevoProducto = document.createElement('div');
        divNuevoProducto.classList.add('producto');
        divNuevoProducto.innerHTML = `
            <div class="form-group">
                <label for="producto" class="form-label">{{ __('Compras.quantity') }}:</label>
                <select name="producte_id[]" class="form-control" required>
                    <option value="">{{ __('Compras.seleccionar_producto') }}</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    {{ __('Compras.seleccionar_producto_mensaje') }}
                </div>
            </div>
            <div class="form-group">
                <label for="cantidad" class="form-label">{{ __('Compras.stock') }}:</label>
                <input type="number" name="cantidad[]" class="form-control" required>
                <div class="invalid-feedback">
                    {{ __('Compras.ingresar_cantidad_mensaje') }}
                </div>
            </div>
        `;
        productosDiv.appendChild(divNuevoProducto);
    }
</script>

@endsection