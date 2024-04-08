@extends('master')

@section('content')

    <div class="content">
        <section class="row mb-4">
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    <button class="btn"><a href="{{ route('ventas.create') }}" style="backgroud-color: blue;">Crear proposta</a></button>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                    <button class="btn"><a href="{{ route('ventas.graficEstat') }}" style="backgroud-color: blue;">Grafica</a></button>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <p>Anàlisi data d'entrada</p>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="card border-secondary">
                    <div class="card-body">
                        <p>Detalls dels productes</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="row md-1">
            <div class="col md-1">
                <div class="card border-primary">
                    <div class="card-body">
                        <h3>Propostes</h3>
                        <div class="overflow-auto" style="max-height: 600px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Client</th>
                                        <th>Estat</th>
                                        <th>Detalls</th>
                                        <th>Preu Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($ventes as $venta)
    @php
        $totalPrecio = 0;
    @endphp

    @foreach($venta->productes as $producto)
    @php
            $ventaProducto = $ventaProductos->where('producte_id', $producto->id)->first();
            $cantidadVendida =  $ventaProducto->CantidadVendida;
        $totalPrecio += $producto->Precio * $cantidadVendida;
        @endphp

    @endforeach

    <tr class="tr" id="row_{{ $venta->id }}" >
        <td onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">{{ $venta->cliente->Nombre }}</td>
        <td>
   <form id="formCambiarEstado" action="{{ route('ventas.cambiarEstado', $venta->id) }}" method="post">
    @csrf
    @method('POST')
    @if($venta->Estado == 'Aceptada')
            <select name="estado" class="form-control" style="background-color: #90EE90 !important;"  onchange="this.form.submit()">
            <option value="Aceptada" {{ $venta->Estado == 'Aceptada' ? 'selected' : '' }}>Aceptada</option>
            <option value="Pendiente" {{ $venta->Estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Rechazada" {{ $venta->Estado == 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
        </select>
        @elseif($venta->Estado == 'Pendiente')
            <select name="estado" class="form-control" style="background-color: #FFFF69 !important;"  onchange="this.form.submit()">
            <option value="Aceptada" {{ $venta->Estado == 'Aceptada' ? 'selected' : '' }}>Aceptada</option>
            <option value="Pendiente" {{ $venta->Estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Rechazada" {{ $venta->Estado == 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
        </select>
        @else
            <select name="estado" class="form-control" style=" background-color: #FF8080 !important; "  onchange="this.form.submit()">
            <option value="Aceptada" {{ $venta->Estado == 'Aceptada' ? 'selected' : '' }}>Aceptada</option>
            <option value="Pendiente" {{ $venta->Estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Rechazada" {{ $venta->Estado == 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
        </select>

        @endif
    <button hidden="true" type="submit">Cambiar Estado</button>
</form>

</td>


        <td onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">{{ $venta->Detalles }}</td>

        <!-- Mostrar el precio solo si hay productos asociados -->

        @if(count($venta->productes) > 0)
            <td onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">{{ $totalPrecio }}</td>
        @else
            <td onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">Sense preu</td>
        @endif
    </tr>
@endforeach




<!-- Imprimir el total al final de la tabla -->

     <!-- Mostrar el total del precio -->


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
<script>
    function redirectToRoute(route) {
        window.location.href = route;
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.cambiar-estado').click(function(e) {
            e.preventDefault();
            var ventaId = $(this).data('venta-id');
            var nuevoEstado = $(this).data('nuevo-estado');
            $.ajax({
                url: '/ventas/' + ventaId + '/cambiarEstado',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    estado: nuevoEstado
                },
                success: function(response) {
                    // Actualizar la interfaz de usuario según la respuesta del servidor
                    if (response.estado) {
                        $('#estado-venta-' + ventaId).text(response.estado);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
