@extends('master')

@section('content')
<div class="content">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="card border-secondary">
                <div class="card-body">
                <a href="{{ route('venedors.create') }}" class="btn btn-primary">{{ __('vendedor.create seller') }}</a>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('vendedor.seller list') }}</div>
                <div class="card-body">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col">{{ __('vendedor.name') }}</th>
                                    <th scope="col">{{ __('vendedor.direction') }}</th>
                                    <th scope="col">{{ __('vendedor.phone') }}</th>
                                    <th scope="col">{{ __('traduccion.accions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendedores as $vendedor)
                                    <tr>
                                        <td>{{ $vendedor->NombreVendedor }}</td>
                                        <td>{{ $vendedor->Direccion }}</td>
                                        <td>{{ $vendedor->Telefono }}</td>
                                        <!-- Here you may add action buttons or links related to the vendedor -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
