@extends('master')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <form action="{{ route('ventas.storeProductes') }}" method="post" class="needs-validation form-container" novalidate>
                @csrf

                <!-- Campos existentes para la venta propuesta -->
                <div id="productos">
                    <div class="mb-3">
                        <label for="nombre_producto" class="form-label">Nombre del Producto:</label>
                        <select name="nombre_producto[]" class="form-control" required>
                            <option value="">Seleccione un producto</option>
                            @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Por favor, ingrese el nombre del producto.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad:</label>
                        <input type="number" name="cantidad[]" class="form-control" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese la cantidad del producto.
                        </div>
                    </div>

                    <!-- Agregar más campos según sea necesario para otros detalles del producto -->

                </div>
                <input type="hidden" name="venta_propuesta_id" value="{{ $venta->id }}">

                <button type="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" onclick="agregarProducto()">Agregar Producto</button>
                <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Afegir tots els productes</button>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        font-family: "Lato", sans-serif;
        background-color: #115571;
        overflow-x: hidden; /* Evita el desplazamiento horizontal */
        margin: 0;
        padding: 0;
    }

    /* Estilo para el formulario */
    .form-container {
        max-width: 100%;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    /* Estilo para los botones del formulario */
    .btn-primary {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    /* Estilo para el botón de agregar producto */
    .btn-success {
        background-color: #28a745;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    /* Estilo para los campos de entrada */
    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    /* Estilo para el mensaje de retroalimentación inválido */
    .invalid-feedback {
        display: none;
        color: #dc3545;
        margin-top: .25rem;
        font-size: 80%;
    }

    /* Estilo para los campos de entrada inválidos */
    .is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + .75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3cpath d='M6 6.5L8.5 9'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
</style>

<script>
    function agregarProducto() {
        var productosDiv = document.getElementById('productos');
        var nuevoProductoHtml = `
            <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre del Producto:</label>
            <select name="nombre_producto[]" class="form-control" required>
                <option value="">Seleccione un producto</option>
                @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->Nombre }}</option>
                @endforeach
            </select>
                <div class="invalid-feedback">
                    Por favor, ingrese el nombre del producto.
                </div>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input type="number" name="cantidad[]" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor, ingrese la cantidad del producto.
                </div>
            </div>
            <!-- Agregar más campos según sea necesario para otros detalles del producto -->
        `;
        var nuevoProducto = document.createElement('div');
        nuevoProducto.innerHTML = nuevoProductoHtml;
        productosDiv.appendChild(nuevoProducto);
    }
</script>
@endsection
