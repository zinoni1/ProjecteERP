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
            margin-left: 250px; /* Ancho del sidebar */
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
@section('body')

    <div class="navbar">
        <button class="openbtn" onclick="openNav()">☰ Menú</button>
    </div>
    <main>


    <div class="content">
        <div class="form-container">
            <h1 class="text-center mb-4">Crear Nuevo Producto</h1>

            <form action="{{ route('productes.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre:</label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa un nombre.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripción:</label>
                    <textarea name="Descripcion" id="Descripcion" class="form-control" required></textarea>
                    <div class="invalid-feedback">
                        Por favor, ingresa una descripción.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Precio" class="form-label">Precio:</label>
                    <input type="number" name="Precio" id="Precio" class="form-control" step="0.01" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa un precio válido.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="Stock" class="form-label">Stock:</label>
                    <input type="number" name="Stock" id="Stock" class="form-control" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa un stock válido.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="FechaEntrada" class="form-label">Fecha de Entrada:</label>
                    <input type="date" name="FechaEntrada" id="FechaEntrada" class="form-control" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa una fecha de entrada.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="imagen">Imagen del producto:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/jpg, image/jpeg, image/png">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Guardar Producto</button>
            </form>
        </div>
    </div>

 </main>
