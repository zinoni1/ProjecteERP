@extends('master')

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
