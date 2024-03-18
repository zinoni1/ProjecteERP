@extends('master')

@section('body')
<style>
body {
  font-family: "Lato", sans-serif;
  background-color: #115571;
  overflow-x: hidden; /* Evita el desplazamiento horizontal */
}

/* Estilo para el sidebar */
.sidenav {
  height: 100%;
  width: 250px; /* Ancho del sidebar */
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #fff; /* Fondo semi-transparente */
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

/* Estilo para los enlaces del sidebar */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #000000; /* Color de texto blanco */
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #87CEFA;
}

/* Estilo para el contenido principal */
.content {
  margin-left: 250px; /* Ancho del sidebar */
  padding: 16px;
  background-color: #115571;
}

/* Estilo para el botón de abrir */
.openbtn {
  font-size: 30px;
  cursor: pointer;
}

/* Estilo para el fondo semi-transparente */
.overlay {
  width: 0;
  position: fixed;
  z-index: 0;
  top: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
  overflow-x: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

/* Estilo para el botón de cerrar */
.closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
  cursor: pointer;
  color: #818181;
}
#logoGACELA{
  display:flex;
  justify-content:center;
  margin-right:30px;
}
</style>
@endsection

@section('content')
<div id="mySidenav" class="sidenav">
  <a id="logoGACELA">
    <img src="media/gazepa-removebg-preview.png" class="card-img-top" alt="Sol·licituds de personal">
  </a>
  <a href="index">DASHBOARD</a>
  <a href="#">PERSONAL</a>
  <a href="#">CLIENT</a>
  <a href="#">VENTAS</a>
  <a href="#" style="color: blue;">PRODUCTES I SERVEIS</a>
  <a href="#">MANTENIMENT</a>
  <a href="#">PRESSUPOSTOS</a>
  <a href="#">STOCK I INVENTARI</a>
  <a href="#">NOTIFICACION</a>
  <a href="#">COMPRES</a>
</div>

<div class="content">
  <h1>Hola Mr. Blai</h1>
</div>

<div class="content">
  <section class="row mb-4">
    <div class="col-3 text-center">
      <div class="card border-secondary">
        <div class="card-body">
        <a href="crearProducte" style="color: blue;">PRODUCTES I SERVEIS</a>        </div>
      </div>
    </div>
    <div class="col-3 text-center">
      <div class="card border-secondary">
        <div class="card-body">
      
<a href="{{ route('mostrarProductes') }}" class="btn btn-primary">Mostrar Productos</a>

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
        <img src="img/personal.svg" class="card-img-top" alt="Personal">
        <div class="card-body">
          <h3>Llista de Productos</h3>
          <div class="overflow-auto" style="max-height: 1000px;">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Fecha de Entrada</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productos as $producto)
                <tr>
                  <td>{{ $producto->id }}</td>
                  <td>{{ $producto->nombre }}</td>
                  <td>{{ $producto->Descripcion }}</td>
                  <td>{{ $producto->Precio }}</td>
                  <td>{{ $producto->Stock }}</td>
                  <td>{{ $producto->FechaEntrada }}</td>
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
@endsection
