@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('venedors.edit seller') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('venedors.update', $vendedor->id) }}">
    @csrf
    @method('PUT')

                        <div class="form-group row">
                            <label for="nombreVendedor" class="col-md-4 col-form-label text-md-right">{{ __('vendedor.name') }}</label>

                            <div class="col-md-6">
                                <input id="nombreVendedor" type="text" class="form-control @error('nombreVendedor') is-invalid @enderror" name="nombreVendedor" value="{{ old('nombreVendedor', $vendedor->NombreVendedor) }}" required autocomplete="nombreVendedor" autofocus>

                                @error('nombreVendedor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Direccion" class="col-md-4 col-form-label text-md-right">{{ __('vendedor.direction') }}</label>

                            <div class="col-md-6">
                                <input id="Direccion" type="text" class="form-control @error('Direccion') is-invalid @enderror" name="Direccion" value="{{ old('Direccion', $vendedor->Direccion) }}" required autocomplete="Direccion">

                                @error('Direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Telefono" class="col-md-4 col-form-label text-md-right">{{ __('vendedor.phone') }}</label>

                            <div class="col-md-6">
                                <input id="Telefono" type="text" class="form-control @error('Telefono') is-invalid @enderror" name="Telefono" value="{{ old('Telefono', $vendedor->Telefono) }}" required autocomplete="Telefono">

                                @error('Telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('vendedor.update seller') }}
                                </button>
                                <a href="{{ route('venedors.index') }}" class="btn btn-secondary">
                                    {{ __('vendedor.cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
