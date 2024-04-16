@extends('master')

@section('content')
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
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            Formulario de Ventas
        </div>
        <div class="card-body">
            <form action="{{ route('ventas.store') }}" method="post" >
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
</div>

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

@endsection
