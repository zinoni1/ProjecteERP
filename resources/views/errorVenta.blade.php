@extends('master')

@section('content')
<div class="container mt-4">
    <div class="alert alert-danger" role="alert">
    {{ __('traduccion.errorventa') }}
    </div>
    <a href="{{ route('dashboard') }}" class="btn btn-primary"> {{ __('traduccion.dashboard') }}</a>
</div>
@endsection
