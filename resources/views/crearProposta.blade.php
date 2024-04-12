@extends('master')
@section('content')

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

@endsection
