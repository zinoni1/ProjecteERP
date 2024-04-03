@extends('master')
<style>
        body {
            font-family: "Lato", sans-serif;
            background-color: #115571;
            overflow-x: hidden; /* Evita el desplazamiento horizontal */
            margin: 0;
            padding: 0;
        }

        /* Estilo para el sidebar */
        .sidenav {
            height: 100%;
            width: 250px; /* Ancho del sidebar */
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #fff; /* Fondo semi-transparente */
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        /* Estilo para los enlaces del sidebar */
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #000000; /* Color de texto blanco */
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #87CEFA;
        }

        /* Estilo para el contenido principal */
        .content {
    margin: 0 auto; /* This will center the content horizontally */
    width: 70%; /* You can adjust the width as needed */
    padding: 16px;
    background-color: #115571;
}

        /* Estilo para el botón de abrir */
        .openbtn {
            font-size: 30px;
            cursor: pointer;
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

        /* Estilo para el botón del formulario */
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
    </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#client_id').change(function(){
            var clientId = $(this).val();
            var currentAction = $('form').attr('action');
            var newAction = currentAction.split('?')[0] + '?client_id=' + clientId;
            $('form').attr('action', newAction);
        });
    });
</script>

<form action="{{ route('ventas.storeProductes') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
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

    </div><input type="hidden" name="venta_propuesta_id" value="{{ $venta->id }}">


    <button type="button" class="btn btn-success" onclick="agregarProducto()">Agregar Producto</button>
    <button type="submit" class="btn btn-primary btn-block mt-3">Afegir tots els productes</button>
</form>


        </div>
    </div>

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
