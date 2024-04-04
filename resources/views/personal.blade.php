@extends('master')

@section('body')
<div class="navbar">
    <button class="openbtn" onclick="openNav()">☰ Menú</button>
</div>
<main>
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo Electrónico</th>
                    <th scope="col">Rol</th>
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
</main>
