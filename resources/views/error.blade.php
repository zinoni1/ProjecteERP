@extends('master')

@section('content')
<div class="container mt-4">
    <div class="alert alert-danger" role="alert">
    {{ __('traduccion.erroradmin') }}
    </div>
    <a href="{{ route('indexPrincipal') }}" class="btn btn-primary">{{ __('traduccion.dashboard') }}</a>
</div>
@endsection
