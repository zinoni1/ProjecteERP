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

<form action="{{ route('ventas.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="Nombre" class="form-label">Estat:</label>
        <select type="select" name="estat" id="estat" class="form-control" required>
            <option>Rechazada</option>
            <option>Pendiente</option>
            <option>Aceptada</option>
        </select>
        <div class="invalid-feedback">
            Si us plau, introdueix un nom.
        </div>
    </div>

    <div class="mb-3">
        <label for="Detalls" class="form-label">Detalls:</label>
        <textarea name="Detalls" id="Detalls" class="form-control" required></textarea>
        <div class="invalid-feedback">
            Si us plau, introdueix una descripció.
        </div>
    </div>

    <div class="mb-3">
        <label for="Client" class="form-label">Client:</label>
        <select type="select" name="client_id" id="client_id" class="form-control" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->Nombre }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Si us plau, selecciona un client.
        </div>
    </div>

    <a href="{{ route('ventas.index') }}" class="btn btn-secondary mt-3">Tornar</a>

    <button type="submit" class="btn btn-primary btn-block" id="submitButton">Seguent</button>
</form>


        </div>
    </div>

