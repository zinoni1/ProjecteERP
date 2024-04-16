@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <div class="card">
                <div class="card-header">{{ __('Compras.new_create_purchase') }}</div>
                <div class="card-body">
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
                    <a href="{{ route('productes.createCompraProducte') }}" class="btn btn-primary">{{ __('Compras.crear_nuevo_producto') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function agregarProducto() {
        var productosDiv = document.getElementById('productos');
        var divNuevoProducto = document.createElement('div');
        divNuevoProducto.classList.add('producto');
        divNuevoProducto.innerHTML = `
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
        `;
        productosDiv.appendChild(divNuevoProducto);
    }
</script>

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
