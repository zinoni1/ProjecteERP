@extends('master')

@section('content')

<div class="content">

    <section class="row md-1">
        <div class="col md-1">
            <div class="card border-primary">
                <div class="card-body">
                <div class="flex justify-between items-center">
    <h3>{{ __('ventas.proposals') }}</h3>
    <div class="space-x-2">
        <button class="btn"><a style="text-decoration: none;" href="{{ route('ventas.create') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ __('ventas.create_proposal') }}</a></button>
        <button class="btn"><a style="text-decoration: none;" href="{{ route('ventas.graficEstat') }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">{{ __('ventas.graph') }}</a></button>
    </div>
</div><br>
                    <div class="overflow-auto" style="max-height: 600px;">
                        <table class="w-full text-sm text-left text-gray-900 dark:text-gray-400 border border-gray-300 bg-gray-200">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th>{{ __('ventas.customer') }}</th>
                                    <th>{{ __('ventas.status') }}</th>
                                    <th>{{ __('ventas.details') }}</th>
                                    <th>{{ __('ventas.total_price') }}</th>
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

                                <tr class="tr" id="row_{{ $venta->id }}" style="cursor: pointer;">
                                    <td onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">{{ $venta->cliente->Nombre }}</td>
                                    <td>
                                        <form id="formCambiarEstado" action="{{ route('ventas.cambiarEstado', $venta->id) }}" method="post">
                                            @csrf
                                            @method('POST')
                                            @if($venta->Estado == 'Aceptada')
                                            <select name="estado" class="form-control" style="background-color: #90EE90 !important; width: 130px !important;" onchange="this.form.submit()">
                                                <option value="Aceptada" {{ $venta->Estado == 'Aceptada' ? 'selected' : '' }}>{{ __('ventas.accepted') }}</option>
                                                <option style="background-color: #FFFF69 !important; width: 130px !important;" value="Pendiente" {{ $venta->Estado == 'Pendiente' ? 'selected' : '' }}>{{ __('ventas.pending') }}</option>
                                                <option style=" background-color: #FF8080 !important; width: 130px !important;" value="Rechazada" {{ $venta->Estado == 'Rechazada' ? 'selected' : '' }}>{{ __('ventas.rejected') }}</option>
                                            </select>
                                            @elseif($venta->Estado == 'Pendiente')
                                            <select name="estado" class="form-control" style="background-color: #FFFF69 !important; width: 130px !important;" onchange="this.form.submit()">
                                                <option style="background-color: #90EE90 !important; width: 130px !important;" value="Aceptada" {{ $venta->Estado == 'Aceptada' ? 'selected' : '' }}>{{ __('ventas.accepted') }}</option>
                                                <option value="Pendiente" {{ $venta->Estado == 'Pendiente' ? 'selected' : '' }}>{{ __('ventas.pending') }}</option>
                                                <option style=" background-color: #FF8080 !important; width: 130px !important;" value="Rechazada" {{ $venta->Estado == 'Rechazada' ? 'selected' : '' }}>{{ __('ventas.rejected') }}</option>
                                            </select>
                                            @else
                                            <select name="estado" class="form-control" style=" background-color: #FF8080 !important; width: 130px !important;" onchange="this.form.submit()">
                                                <option style="background-color: #90EE90 !important; width: 130px !important;" value="Aceptada" {{ $venta->Estado == 'Aceptada' ? 'selected' : '' }}>{{ __('ventas.accepted') }}</option>
                                                <option style="background-color: #FFFF69 !important; width: 130px !important;" value="Pendiente" {{ $venta->Estado == 'Pendiente' ? 'selected' : '' }}>{{ __('ventas.pending') }}</option>
                                                <option value="Rechazada" {{ $venta->Estado == 'Rechazada' ? 'selected' : '' }}>{{ __('ventas.rejected') }}</option>
                                            </select>

                                            @endif
                                            <button hidden="true" type="submit"></button>
                                        </form>

                                    </td>


                                    <td onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">{{ $venta->Detalles }}</td>

                                    <!-- Mostrar el precio solo si hay productos asociados -->

                                    @if(count($venta->productes) > 0)
                                    <td onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">{{ $totalPrecio }}€</td>
                                    @else
                                    <td onclick="redirectToRoute('{{ route('VentaPropuesta.show', $venta->id) }}')">Sense preu</td>
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="mt-4">
                {{ $ventes->links() }}
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
