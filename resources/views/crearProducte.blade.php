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

