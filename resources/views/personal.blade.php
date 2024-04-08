@extends('master')

@section('content')
    <div class="container">
        <h1>{{ __('traduccion.llistausuaris') }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">{{ __('traduccion.usuaris') }}</th>
                    <th scope="col">{{ __('traduccion.correu') }}</th>
                    <th scope="col">{{ __('traduccion.rol') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
